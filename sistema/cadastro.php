<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$conf_senha = $_POST['conf_senha'];

if($senha != $conf_senha){
    echo 'As senhas não se coincidem!';
    exit();
}



?>