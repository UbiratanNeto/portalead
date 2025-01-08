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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
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
                            <a href="#" class="text-danger" data-toggle="modal" data-target="#modalRecuperar">
                                Recuperar Senha?
                            </a>
                        </div>

                        <div class="text-center p-t-8 p-b-31">
                            Não tem Cadastro?

                            <a href="#" class="text-primary" data-toggle="modal" data-target=#modalCadastro>Cadastre-se</a>

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


<!-- Modal Cadastro -->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Faça seu Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-cadastro">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome e Sobrenome">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Confirmar Senha</label>
                            <input type="password" class="form-control" id="conf_senha" name="conf_senha">
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="termos" name="termos" value="Sim">
                        <label class="form-check-label" for="exampleCheck1">Aceitar<a href="termos.php" target="_blank"> termos e condições</a></label>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Recuperar Senha -->
<div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-recuperar">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail ou CPF</label>
                        <input type="text" class="form-control" name="recuperar" placeholder="Seu E-mail cadastrado ou CPF">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Recuperar</button>
            </div>
        </div>
    </div>
</div>