<?php
require_once('conexao.php');
$senha = '123';
$senha_crip = md5($senha);

//VERIFICAR SE EXISTE UM USUÁRIO ADMINISTRADOR CRIADO NO BANCO
$query = $pdo->query("SELECT * FROM usuarios where nivel = 'Administrador'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    //CRIAR UM USUARIO ADMINISTRADOR CASO NÃO EXISTA NENHUM USUÁRIO'
    $pdo->query("INSERT INTO usuarios SET nome = 'Administrador', cpf = '000.000.000-00', usuario = '$email_sistema', senha = '$senha', senha_crip = '$senha_crip', nivel = 'Administrador', foto = 'sem-perfil.jpg', id_pessoa = 1, ativo = 'Sim', data = curDate() ");
}

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