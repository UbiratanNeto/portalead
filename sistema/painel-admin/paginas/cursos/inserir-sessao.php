<?php 
require_once("../../../conexao.php");
$tabela = 'sessao';

$nome = $_POST['nome_sessao'];
$id_curso = $_POST['id'];

$sessao_aula = 0;

//validar num aula duplicado
$query = $pdo->query("SELECT * FROM $tabela where nome = '$nome' and curso = '$id_curso'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	echo 'Sessão já cadastrada, escolha outro nome!';
	exit();
}

$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, curso = '$id_curso'");


$query->bindValue(":nome", "$nome");
$query->execute();

echo 'Salvo com Sucesso';

?>