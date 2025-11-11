<?php
require_once("sistema/conexao.php");

$url = $_GET['url'];

$query = $pdo->query("SELECT * FROM cursos where nome_url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    $palavras_chaves = $res[0]['palavras'];
    $nome_curso_titulo = $res[0]['nome'];

    $id = $res[0]['id'];
    $nome = $res[0]['nome'];
    $desc_rapida = $res[0]['desc_rapida'];
    $desc_longa = $res[0]['desc_longa'];
    $valor = $res[0]['valor'];
    $professor = $res[0]['professor'];
    $categoria = $res[0]['categoria'];
    $foto = $res[0]['imagem'];
    $status = $res[0]['status'];
    $carga = $res[0]['carga'];
    $mensagem = $res[0]['mensagem'];
    $arquivo = $res[0]['arquivo'];
    $ano = $res[0]['ano'];
    $palavras = $res[0]['palavras'];
    $grupo = $res[0]['grupo'];
    $nome_url = $res[0]['nome_url'];
    $pacote = $res[0]['pacote'];
    $sistema = $res[0]['sistema'];
    $link = $res[0]['link'];
    $tecnologias = $res[0]['tecnologias'];
    $promocao = $res[0]['promocao'];
}

require_once("cabecalho.php");
?>

<hr>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <h3><?php echo $nome ?> - <small><?php echo $desc_rapida ?></small></h3>
        </div>

        <div class="col-md-3 col-sm-12">
            <p> <i class="fa fa-question-circle mr-1"></i>Dúvidas? Contate-nos</p>
        </div>
    </div>
</div>

<hr>
<?php
require_once("rodape.php");
?>