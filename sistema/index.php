<?php
require_once('conexao.php');
//CRIAR UM USUARIO ADMINISTRADOR CASO NÃO EXISTA NENHUM USUÁRIO

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Hugo Cursos</title>
</head>
<body>
    <form method="POST" action="autenticar.php">
        <input type="text" name="usuario" placeholder="Email ou Cpf">
        <input type="password" name="senha" placeholder="Digite sua senha">
        <button type="submit">Logar</button>
    </form>
</body>
</html>