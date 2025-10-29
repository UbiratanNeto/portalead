<?php
require_once("cabecalho.php");
?>


<?php
$query = $pdo->query("SELECT * FROM banner_index where ativo = 'Sim' ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <?php
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                $id = $res[$i]['id'];
                $titulo = $res[$i]['titulo'];
                $descricao = $res[$i]['descricao'];
                $link = $res[$i]['link'];
                $foto = $res[$i]['foto'];
                $ativo = $res[$i]['ativo'];

                $classe_ativo = '';
                if ($i == 0) {
                    $classe_ativo = 'active';
                }

            ?>


                <div class="item <?php echo $classe_ativo ?>">
                    <div class="fill" style="background-image:url('sistema/painel-admin/img/banners/<?php echo $foto ?>');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading"><span><?php echo $titulo ?></span></h1>
                        <p class="banner_txt"><?php echo $descricao ?></p>
                        <div class="slider_btn">
                            <a href="<?php echo $link ?>" type="button" class="btn btn-primary slide">Veja Mais <i class="fa fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div>

        <!-- Left and right controls -->

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>

    </div>

<?php } ?>

<hr>

<section id="about">
    <div class="image-holder col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
        <div class="background-imgholder">
            <img src="img/1.jpg" alt="about" class="img-responsive" style="display:none;" />
        </div>
    </div>

    <div class="container-fluid">

        <div class="col-md-7 col-md-offset-5 col-sm-8 col-sm-offset-2 col-xs-12 text-inner ">
            <div class="text-block">
                <div class="section-heading">
                    <h1>SOBRE <span>NÓS</span></h1>
                    <p class="subheading">Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut.</p>
                </div>

                <ul class="aboutul">
                    <li> <i class="fa fa-check"></i>Vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</li>
                    <li> <i class="fa fa-check"></i>legimus copiosae instructior ei ut vix denique fierentis atqui mucius consequat ad pro.</li>
                    <li> <i class="fa fa-check"></i>Ea saperet inimicu ut qui dolor oratio maiestatis ubique mnesarchum.</li>
                    <li> <i class="fa fa-check"></i>Sanctus voluptatibus et per illum noluisse facilisis quo atqui mucius ad pro.</li>
                    <li> <i class="fa fa-check"></i>At illum noluisse facilisis quo te dictas epicurei suavitate qui his ad.</li>
                    <li> <i class="fa fa-check"></i>Tantas propriae mediocritatem id vix qui everti efficiantur an ocurreret consetetur.</li>
                </ul>

                <a href="sobre.php" type="button" class="btn btn-primary slide">Veja Mais <i class="fa fa-caret-right"></i> </a>


            </div>
        </div>
    </div>
</section>



<?php
$query = $pdo->query("SELECT * FROM categorias ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>

    <section id="process">
        <div class="container">
            <div class="section-heading text-center">
                <div class="col-md-12 col-xs-12">
                    <h1>Principais <span>Formações</span></h1>
                    <p class="subheading">Conheça nossas principais categorias de treinamentos, temos <?php echo $total_reg ?> áreas de atuação! Clique <a href="categorias.php"><span>aqui</span></a>
                        para ver todas as categorias.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 block process-block">
                    <div class="process-icon-holder">
                        <div class="process-border">
                            <span class="process-icon"><a href="#"><i class="fa fa-globe feature_icon"></i></a></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="process-text-block">
                        <h4><a href="#">Programador WEB</a></h4>
                        <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 block process-block">
                    <div class="process-icon-holder">
                        <div class="process-border">
                            <span class="process-icon"><a href="#"><i class="fa fa-mobile feature_icon"></i></a></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="process-text-block">
                        <h4><a href="#">Programador Mobile</a></h4>
                        <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 block process-block">
                    <div class="process-icon-holder">
                        <div class="process-border">
                            <span class="process-icon"><a href="#"><i class="fa fa-magic feature_icon"></i></a></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="process-text-block">
                        <h4><a href="#">WEB Design</a></h4>
                        <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 block process-block lastchild">
                    <div class="process-icon-holder">
                        <div class="process-border">
                            <span class="process-icon"><a href="#"><i class="fa fa-cog feature_icon"></i></a></span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="process-text-block">
                        <h4><a href="#">Programador Desktop</a></h4>
                        <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php } ?>


<hr>

<?php
$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' and sistema = 'Não' ORDER BY id desc limit 6");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>

    <section>
        <div class="section-heading text-center">
            <div class="col-md-12 col-xs-12">
                <h1>Últimos <span>Lançamentos</span></h1>
                <p class="subheading">Clique <a href="cursos.php"><span>aqui</span></a> para ver todos os cursos.</p>
            </div>
        </div>

        <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-20px;">

            <?php
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                $id = $res[$i]['id'];
                $nome = $res[$i]['nome'];
                $desc_rapida = $res[$i]['desc_rapida'];
                $valor = $res[$i]['valor'];
                $foto = $res[$i]['imagem'];
                $promocao = $res[$i]['promocao'];

                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');


            ?>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="product-card">
                        <div class="product-tumb">
                            <a href=""><img src="sistema/painel-admin/img/cursos/<?php echo $foto ?>" alt="" width="100%"></a>
                        </div>
                        <div class="product-details">
                            <h4><a href=""><?php echo $nome ?></a></h4>
                            <p><?php echo $desc_rapida ?></p>
                            <?php if ($promocao > 0) { ?>
                                <div class="product-bottom-details">
                                    <div class="product-price"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="product-bottom-details">
                                    <div class="product-price">R$ <?php echo $valorF ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>



        </div>
        
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/portfolio-1.jpg"></div>
                                <div class="portfolio-hover">
                                    <a class="portfolio-link" href="#"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-zoom" href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Lorem Ipsum</h5>
                                <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/portfolio-1.jpg"></div>
                                <div class="portfolio-hover">
                                    <a class="portfolio-link" href="#"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-zoom prettyPhoto" href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Lorem Ipsum</h5>
                                <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/portfolio-1.jpg"></div>
                                <div class="portfolio-hover">
                                    <a class="portfolio-link" href="#"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-zoom prettyPhoto" href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Lorem Ipsum</h5>
                                <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/portfolio-1.jpg"></div>
                                <div class="portfolio-hover">
                                    <a class="portfolio-link" href="#"><i class="fa fa-link"></i></a>
                                    <a class="portfolio-zoom prettyPhoto" href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Lorem Ipsum</h5>
                                <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>

                </div>
            </div>
        </section>
    </section>

<?php } ?>





<br>
<hr>

<?php
$query = $pdo->query("SELECT * FROM pacotes ORDER BY id desc limit 6");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>

    <section>
        <div class="section-heading text-center">
            <div class="col-md-12 col-xs-12">
                <h1>Últimos <span>Pacotes</span></h1>
                <p class="subheading">Clique <a href="pacotes.php"><span>aqui</span></a> para ver todos os pacotes.</p>
            </div>
        </div>

        <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-20px;">

            <?php
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {
                }
                $id = $res[$i]['id'];
                $nome = $res[$i]['nome'];
                $desc_rapida = $res[$i]['desc_rapida'];
                $valor = $res[$i]['valor'];
                $foto = $res[$i]['imagem'];
                $promocao = $res[$i]['promocao'];

                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');


            ?>

                <div class="col-md-2 col-sm-4 col-xs-6">
                    <div class="product-card">
                        <div class="product-tumb">
                            <a href=""><img src="sistema/painel-admin/img/pacotes/<?php echo $foto ?>" alt="" width="100%"></a>
                        </div>
                        <div class="product-details">
                            <h4><a href=""><?php echo $nome ?></a></h4>
                            <p><?php echo $desc_rapida ?></p>
                            <?php if ($promocao > 0) { ?>
                                <div class="product-bottom-details">
                                    <div class="product-price"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="product-bottom-details">
                                    <div class="product-price">R$ <?php echo $valorF ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>



        </div>

    </section>

<?php } ?>



<br>
<hr>


<section id="testimonial">
    <div class="container">
        <div class="section-heading text-center">
            <div class="col-md-12 col-xs-12">
                <h1>Depoimentos <span>Nossos Alunos</span></h1>
                <p class="subheading"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-12 block ">
                <div class="testimonial_box">
                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset. </p>
                </div>
                <div class="arrow-down"></div>
                <div class="testimonial_user">
                    <div class="user-image"><img src="img/user1.png" alt="user" class="img-responsive" /></div>
                    <div class="user-info">
                        <h5>Lorem Ipsum</h5>
                        <p>Manager</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-sm-12 block">
                <div class="testimonial_box">
                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset. </p>
                </div>
                <div class="arrow-down"></div>
                <div class="testimonial_user">
                    <div class="user-image"><img src="img/user1.png" alt="user" class="img-responsive" /></div>
                    <div class="user-info">
                        <h5>Lorem Ipsum</h5>
                        <p>Manager</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 block">
                <div class="testimonial_box">
                    <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum ea utamur impetus fuisset. </p>
                </div>
                <div class="arrow-down"></div>
                <div class="testimonial_user">
                    <div class="user-image"><img src="img/user1.png" alt="user" class="img-responsive" /></div>
                    <div class="user-info">
                        <h5>Lorem Ipsum</h5>
                        <p>Manager</p>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>


<?php
require_once("rodape.php");
?>