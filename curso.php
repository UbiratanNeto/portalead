<?php
require_once("sistema/conexao.php");

$url = $_GET['url'];

$query = $pdo->query("SELECT * FROM cursos where nome_url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
$palavras_chaves = $res[0]['palavras'];
$nome_curso_titulo = $res[0]['nome'];
}

require_once("cabecalho.php");
?>

<hr>

fddsfsd

<hr>
<?php
require_once("rodape.php");
 ?>