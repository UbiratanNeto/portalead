<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

$query = $pdo->query("SELECT * FROM usuarios where usuario = '$usuario' and senha = '$senha'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {


}
?>