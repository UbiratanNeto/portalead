<?php
require_once('../conexao.php');
require_once('verificar.php');
$pag = 'pacotes';

if (@$_SESSION['nivel'] != 'Administrador' and @$_SESSION['nivel'] != 'Professor') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}
?>


<button onclick="inserir()" type="button" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i>Novo Pacote</button>


<div class="bs-example widget-shadow" style="padding:15px" id="listar">

</div>





<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tituloModal"></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" id="form-niceEdit">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Subtítulo</label>
								<input type="text" class="form-control" name="desc_rapida" id="desc_rapida">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Linguagem</label>
								<select class="form-control sel2" name="linguagem" id="linguagem" required style="width:100%;">
									<option value="0">Selecionar Linguagem</option>
									<?php
									$query = $pdo->query("SELECT * FROM linguagens order by nome asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
									?>
										<option value="<?php echo $res[$i]['id'] ?>"><?php echo $res[$i]['nome'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Grupo</label>
								<select class="form-control sel2" name="grupo" id="grupo" required style="width:100%;">
									<?php
									$query = $pdo->query("SELECT * FROM grupos order by nome asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									for ($i = 0; $i < @count($res); $i++) {
										foreach ($res[$i] as $key => $value) {
										}
									?>
										<option value="<?php echo $res[$i]['id'] ?>"><?php echo $res[$i]['nome'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-2">
							<div class="form-group">
								<label>Valor</label>
								<input type="text" class="form-control" name="valor" id="valor">
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Valor Promoção</label>
								<input type="text" class="form-control" name="promocao" id="promocao">
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Palavras-chaves</label>
								<input type="text" class="form-control" name="palavras" id="palavras" placeholder="Ex: Curso de programação, desenvolvimento web, etc...">
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-8 col-sm-12">
							<div class="form-group">
								<label>Descrição do Pacote</label>
								<textarea name="desc_longa" id="area" class="textarea"></textarea>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Imagem</label>
								<input class="form-control" type="file" name="foto" onChange="carregarImg();" id="foto">
							</div>

							<div id="divImg">
								<img src="img/cursos/sem-foto.png" width="130px" id="target">
							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-8">
						<div class="form-group">
							<label>Vídeo <small>(Url Incorporada)</small></label>
							<input onkeyup="carregarVideo();" type="text" name="video" id="video" class="form-control">
						</div>
						</div>

						<div class="col-md-2" style="margin-top:15px">
							<iframe width="100%" height="130" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
							allowfullscreen id="target-video"></iframe>
						</div>

						<div class="col-md-2" style="margin-top:17px">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>

					</div>

					<br>
					<input type="hidden" name="id" id="id">
					<small><div id="mensagem" align="center" class="mt-3"></div></small>
				</div>

	
				
			</form>
		</div>
	</div>
</div>


<!-- Modal Mostrar -->
<div class="modal fade" id="modalMostrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tituloModal"><span id="nome_mostrar"> </span> - Status : <span id="status_mostrar"> </span></h4>
				<button id="btn-fechar-excluir" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">



				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-4">
						<span><b>Subtítulo: </b></span>
						<span id="desc_rapida_mostrar"></span>
					</div>
					<div class="col-md-2">
						<span><b>Valor: </b></span>
						<span id="valor_mostrar"></span>
					</div>
					<div class="col-md-2">
						<span><b>Promoção: </b></span>
						<span id="promocao_mostrar"></span>
					</div>
					<div class="col-md-4">
						<span><b>Professor: </b></span>
						<span id="professor_mostrar"></span>
					</div>

				</div>


				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-3">
						<span><b>Linguagem: </b></span>
						<span id="categoria_mostrar"></span>
					</div>
					<div class="col-md-3">
						<span><b>Grupo: </b></span>
						<span id="grupo_mostrar"></span>
					</div>
					<div class="col-md-3">
						<span><b>Ano: </b></span>
						<span id="ano_mostrar"></span>
					</div>
					<div class="col-md-3">
						<span><b>Carga: </b></span>
						<span id="carg_mostrar"></span>
					</div>
				</div>


				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-12">
						<span><b>Palavras Chaves: </b></span>
						<span id="palavras_mostrar"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<span><b>Descrição do Pacote: </b></span>
						<small><span id="desc_longa_mostrar"></span></small>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6" align="center">
						<img width="100%" id="target_mostrar">
					</div>

					<div class="col-md-6" align="center">
						<iframe width="100%" height="250" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
						allowfullscreen id="target_video_mostrar"></iframe>
					</div>

				</div>


			</div>
		</div>
	</div>
</div>


<!-- Modal Cursos -->
<div class="modal fade" id="modalCursos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="nome_pacote_titulo"> </span> - <span id="total_cursos"> </span> Cursos </h4>
				<button id="btn-fechar-aula" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
					<div class="row">
					<div class="col-md-6">
						<?php
						$query = $pdo->query("SELECT * FROM cursos where professor LIKE '$id_usuario' ORDER BY id asc");
						$res = $query->fetchAll(PDO::FETCH_ASSOC);
						$total_reg = @count($res);
						if ($total_reg > 0) {
						?>

						<table class="table table-hover" id="tabela">
						<thead> 
						<tr> 
						<th>Nome</th>
						<th>Ações</th>
						</tr> 
						</thead> 
						<tbody>

						<?php 
						for ($i = 0; $i < $total_reg; $i++) {
						foreach ($res[$i] as $key => $value) {
						}
						$id = $res[$i]['id'];
						$nome = $res[$i]['nome'];
						?>

						<tr>
						<td><?php echo $nome ?></td>
						<td>
							<big><a href="#" onclick="add('{$id}')" title="Adicionar Curso"><i class="fa fa-check verde"></i></a></big>
						</td>

						</tr>


						<?php } } ?>

					</div>

					<div class="col-md-6">
						<div id="listar-cursos"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">var pag = "<?= $pag ?>"</script>
<script src="js/ajax.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.sel2').select2({
			dropdownParent: $('#modalForm')
		});
	});
</script>


<script type="text/javascript">
	function carregarImg() {
		var target = document.getElementById('target');
		var file = document.querySelector("#foto").files[0];

		var reader = new FileReader();

		reader.onloadend = function() {
			target.src = reader.result;
		};

		if (file) {
			reader.readAsDataURL(file);

		} else {
			target.src = "";
		}
	}
</script>

<script type="text/javascript">
	$("#form-niceEdit").submit(function() {
		event.preventDefault();
		nicEditors.findEditor('area').saveContent();
		var formData = new FormData(this);

		$.ajax({
			url: 'paginas/' + pag + "/inserir.php",
			type: 'POST',
			data: formData,

			success: function(mensagem) {
				$('#mensagem').text('');
				$('#mensagem').removeClass()
				if (mensagem.trim() == "Salvo com Sucesso") {
					$('#btn-fechar').click();
					listar();
				} else {
					$('#mensagem').addClass('text-danger')
					$('#mensagem').text(mensagem)
				}

			},

			cache: false,
			contentType: false,
			processData: false,

		});



	});
</script>


<script type="text/javascript">
	function carregarVideo() {
		$('#target-video').attr('src', $('#video').val());
	}
</script>


<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>