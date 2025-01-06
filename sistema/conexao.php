<?php
$usuario = 'root';
$senha = '';
$banco = 'portal';
$servidor = 'localhost';

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro ao conectar no banco de dados!!<br><br>'.$e;
}


//VARIÁVEIS DO SISTEMA
$nome_sistema = 'Portal Hugo Cursos';
$email_sistema = 'contato@hugocursos.com.br'

?>