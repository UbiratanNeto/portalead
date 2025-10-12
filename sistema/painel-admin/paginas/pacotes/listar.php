<?php
require_once("../../../conexao.php");
$tabela = 'pacotes';

@session_start();
if($_SESSION['nivel'] == 'Administrador'){
	$acesso = '';
	$id_usuario = '%%';
}else{
	$acesso = 'ocultar';
	$id_usuario = '%'.$_SESSION['id'].'%';
}
echo <<<HTML
<small>
HTML;

$query = $pdo->query("SELECT * FROM $tabela where professor LIKE '$id_usuario' ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
	echo <<<HTML
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>
	<th class="esc">Valor</th> 
	<th class="esc">Professor</th>
	<th class="esc">Linguagem</th>
	<th class="esc">Alunos</th>
	<th class="esc">Cursos</th>
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>
HTML;

	for ($i = 0; $i < $total_reg; $i++) {
		foreach ($res[$i] as $key => $value) {
		}
		$id = $res[$i]['id'];
		$nome = $res[$i]['nome'];
		$desc_rapida = $res[$i]['desc_rapida'];
		$desc_longa = $res[$i]['desc_longa'];
		$valor = $res[$i]['valor'];
		$promocao = $res[$i]['promocao'];
		$professor = $res[$i]['professor'];
		$linguagem = $res[$i]['linguagem'];
		$foto = $res[$i]['imagem'];
		$ano = $res[$i]['ano'];
		$palavras = $res[$i]['palavras'];
		$grupo = $res[$i]['grupo'];
		$nome_url = $res[$i]['nome_url'];
		$video = $res[$i]['video'];


		$query2 = $pdo->query("SELECT * FROM usuarios where id = '$professor'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_professor = $res2[0]['nome'];

		$query2 = $pdo->query("SELECT * FROM linguagens where id = '$linguagem'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		if(@count($res2) > 0){
			$nome_linguagem = $res2[0]['nome'];
		} else {
			$nome_linguagem = 'Sem Registro';
		}
		
		$query2 = $pdo->query("SELECT * FROM grupos where id = '$grupo'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$nome_grupo = $res2[0]['nome'];

		$query2 = $pdo->query("SELECT * FROM cursos_pacotes where id_pacote = '$id'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$cursos = @count($res2);
		$carga = 0;
		if($cursos > 0){
				for ($i2 = 0; $i2 < $cursos; $i2++){
				foreach ($res2[$i2] as $key => $value){}
				$id_curso = $res2[$i2]['id_curso'];

				$query3 = $pdo->query("SELECT * FROM cursos where id = '$id_curso'");
				$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
				$carga += $res3[0]['carga'];
			}
		}


		//FORMATAR VALORES
		$valorF = number_format($valor, 2, ',', '.');
		$desc_longa = str_replace('"', "**", $desc_longa);
		$promocaoF = number_format($promocao, 2, ',', '.');

		if($promocao > 0 ){
			$promo = ' / '.$promocaoF;
		} else {
			$promo = '';
		}

echo <<<HTML
<tr class=""> 
		<td><img src="img/pacotes/{$foto}" width="27px" class="mr-2">
		<a href="#" onclick="cursos('{$id}', '{$nome}', '{$cursos}')" class="cinza_escuro">
		{$nome}
		</a>
		</td> 
		<td class="esc">
		R$ {$valorF} <small><b><span class="text-danger">{$promo}</span></b></small>
		</td>
		<td class="esc">{$nome_professor}</td>		
		<td class="esc">{$nome_linguagem}</td>
		<td class="esc">0</td>
		<td class="esc">{$cursos}</td>
		<td>
		<big><a href="#" onclick="editar('{$id}', '{$nome}', '{$desc_rapida}', '{$desc_longa}', '{$valor}', '{$promocao}', '{$linguagem}', '{$foto}', '{$palavras}','{$grupo}','{$video}')" 
		title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

		<big><a href="#" onclick="mostrar('{$nome}', '{$desc_rapida}','{$desc_longa}','{$valorF}', '{$promocaoF}', '{$nome_professor}','{$nome_linguagem}','{$foto}', 
		'{$ano}', '{$palavras}', '{$nome_grupo}', '{$video}', '{$carga}')" title="Ver Dados"><i class="fa fa-info-circle text-secondary"></i></a></big>

		<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>

		<big><a href="#" onclick="cursos('{$id}', '{$nome}', '{$cursos}')" title="Inserir Pacotes"><i class="fa fa-book verde"></i></a></big>

		</td>
</tr>
HTML;
	}

	echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>	
HTML;
} else {
	echo 'Não possui nenhum registro cadastrado!';
}
echo <<<HTML
</small>
HTML;


?>


<script type="text/javascript">
	$(document).ready(function() {
		$('#tabela').DataTable({
			"ordering": false,
			"stateSave": true,
		});
		$('#tabela_filter label input').focus();
	});

	function editar(id, nome, desc_rapida, desc_longa, valor, promocao, linguagem, foto, palavras, grupo, video, carga) {

	for (let letra of desc_longa){  				
			if (letra === '*'){
				desc_longa = desc_longa.replace('**', '"');
			}			
		}	

		$('#id').val(id);
		$('#nome').val(nome);
		$('#desc_rapida').val(desc_rapida);
		nicEditors.findEditor("area").setContent(desc_longa);	
		$('#valor').val(valor);
		$('#promocao').val(promocao);
		$('#linguagem').val(linguagem).change();

		$('#palavras').val(palavras);
		$('#grupo').val(grupo).change();	;

		$('#foto').val('');
		$('#target').attr('src','img/pacotes/' + foto);	
		
		$('#video').val(video);
		$('#target-video').attr('src', video);
		

		$('#tituloModal').text('Editar Registro');
		$('#modalForm').modal('show');
		$('#mensagem').text('');
	}


	
	function mostrar(nome, desc_rapida, desc_longa, valor, promocao, professor, linguagem, foto, ano, palavras, grupo, video, carga){	
		
		$('#nome_mostrar').text(nome);
		$('#desc_rapida_mostrar').text(desc_rapida);
		$('#desc_longa_mostrar').html(desc_longa);
		$('#valor_mostrar').text(valor);
		$('#promocao_mostrar').text(valor);
		$('#professor_mostrar').text(professor);
		$('#categoria_mostrar').text(linguagem);
		$('#carga_mostrar').text(carga);

		$('#ano_mostrar').text(ano);
		$('#palavras_mostrar').text(palavras);
		$('#grupo_mostrar').text(grupo);

		$('#target_mostrar').attr('src','img/pacotes/' + foto);
		$('#target_video_mostrar').attr('src', video);

		$('#modalMostrar').modal('show');
		
	}


		function limparCampos(){
		$('#id').val('');
		$('#nome').val('');
		$('#desc_rapida').val('');
		nicEditors.findEditor("area").setContent('');				
		$('#valor').val('');
		$('#promocao').val('');		
		$('#palavras').val('');		
		$('#foto').val('');
		$('#video').val('');
		$('#target').attr('src','img/cursos/sem-foto.png');
		$('#target-video').attr('src','');
	}

	function cursos(id, nome, cursos){
		$('#id_pacote').val(id);
		$('#nome_pacote_titulo').text(nome);
		$('#total_cursos').text(cursos);
		$('#modalCursos').modal('show');
		listarCursos();
	}



</script>