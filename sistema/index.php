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

//CRIAR UM ADMINISTRADOR NA TABELA ADMINISTRADORES
$pdo->query("INSERT INTO administradores SET nome = 'Administrador', cpf = '000.000.000-00', email = '$email_sistema', telefone = '$tel_sistema', foto = 'sem-perfil.jpg', ativo = 'Sim', data = curDate() ");

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome_sistema ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
</head>

<body>
    <div class="container-fluid">

        <section class="login-block mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 login-sec">
                        <h5 class="text-center mb-4"><img class="mr-1" src="img/logo.png" width="50px">Faça seu Login</h5>


                        <form class="login100-form validate-form" action="autenticar.php" method="post">
                            <div class="wrap-input100 validate-input">
                                <span class="label-input100">Usuário</span><br>
                                <input type="text" name="usuario" class="input100" placeholder="Usuário" pattern="[A-Za-z0-9_-@.]{1,15}" required>
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input">
                                <span class="label-input100">Senha</span>
                                <input type="password" name="senha" class="input100" placeholder="Senha" pattern="[A-Za-z0-9_-@.]áêã{1,15}" required>
                                <span class="focus-input100 password"></span>
                            </div>



                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <button class="btn btn-primary">
                                        Logar
                                    </button>
                                </div>
                            </div>


                        </form>

                        <div class="copy-text">
                            <a class="text-danger">
                                Recuperar Senha?
                            </a>
                        </div>

                        <div class="text-center p-t-8 p-b-31">
                            Não tem Cadastro?

                            <a class="text-primary">Cadastre-se</a>

                        </div>


                    </div>
                    <div class="col-md-8 banner-sec">
                        <div class="signup__overlay"></div>
                        <div class="banner">
                            <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">


                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a href="#" target="_blank">
                                            <img src="img/login/banner-login.jpg" height="" width="100%">
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>

        <!-- login end -->

    </div>
</body>

</html>