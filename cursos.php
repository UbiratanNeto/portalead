<?php
require_once("cabecalho.php");

?>



<br>
<hr>


<?php
$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' and sistema = 'Não' ORDER BY id asc limit 8");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>


    <div class="section-heading" align="center">
        <div class="col-md-12 col-xs-12">
            <h1><small><small><span>Cursos Mais Vendidos</span> - <a href="lista-cursos">Ver todos os Cursos</a></small></small></h1>

        </div>
    </div>
    
    <br>
    <hr>




    <section id="portfolio">

        <div class="row" style="margin-left:5px; margin-right:5px; margin-top:-40px;">

            <?php
            for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}
                $id = $res[$i]['id'];
                $nome = $res[$i]['nome'];
                $desc_rapida = $res[$i]['desc_rapida'];
                $valor = $res[$i]['valor'];
                $foto = $res[$i]['imagem'];
                $promocao = $res[$i]['promocao'];
                $url = $res[$i]['nome_url'];

                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');

                $query2 = $pdo->query("SELECT * FROM aulas where curso = '$id' and num_aula = 1 order by id asc");
                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                $total_reg2 = @count($res2);
                if ($total_reg2 > 0) {
                    $primeira_aula = $res2[0]['link'];
                } else {
                    $primeira_aula = "";
                }


            ?>


                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 portfolio-item">
                    <div class="portfolio-one">
                        <div class="portfolio-head">
                            <div class="portfolio-img"><img alt="" src="sistema/painel-admin/img/cursos/<?php echo $foto ?>"></div>
                            <div class="portfolio-hover">
                                <iframe class="video-card" src="<?php echo $primeira_aula ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="" align="center" style="margin-top: 20px; ">
                                    <a href="curso-de-<?php echo $url ?>" type="button" class="btn btn-primary2 slide">Veja Mais <i class="fa fa-caret-right"></i></a>
                                </div>

                            </div>
                        </div>
                        <!-- End portfolio-head -->
                        <a href="curso-de-<?php echo $url ?>" title="Detalhes do Curso">
                            <div class="portfolio-content" style="text-align: center;">
                                <h5 class="title"><?php echo $nome ?></h5>
                                <div style="margin-top: -10px; text-decoration: none !important"><?php echo $desc_rapida ?></div>

                                <?php if ($promocao > 0) { ?>
                                    <div class="product-bottom-details">
                                        <div class="product-price"><small>De <?php echo $valorF ?></small>Por R$ <?php echo $promocaoF ?></div>
                                    </div>
                                <?php } else { ?>
                                    <div class="product-bottom-details">
                                        <div class="product-price"><span>R$ <?php echo $valorF ?></span></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                        <!-- End portfolio-content -->
                    </div>
                    <!-- End portfolio-item -->
                </div>


            <?php } ?>



        </div>
    </section>


<?php } ?>














<br>
<hr>


<?php
$query = $pdo->query("SELECT * FROM pacotes  ORDER BY id asc limit 8");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    ?>


    <div class="section-heading" align="center">
        <div class="col-md-12 col-xs-12">
            <h1><small><small><span>Pacotes Mais Vendidos</span> - <a href="pacotes">Ver todos os Pacotes</a></small></small></h1>

        </div>
    </div>

    <br>
    <hr>




    <section id="portfolio">

        <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-20px;">

            <?php
                for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}
                $id = $res[$i]['id'];
                $nome = $res[$i]['nome'];
                $desc_rapida = $res[$i]['desc_rapida'];
                $valor = $res[$i]['valor'];
                $foto = $res[$i]['imagem'];
                $promocao = $res[$i]['promocao'];
                $primeira_aula = $res[$i]['video'];
                $url = $res[$i]['nome_url'];


                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');


                ?>


                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 portfolio-item">
                    <div class="portfolio-one">
                        <div class="portfolio-head">
                            <div class="portfolio-img"><img alt="" src="sistema/painel-admin/img/pacotes/<?php echo $foto ?>"></div>
                            <div class="portfolio-hover">
                               <iframe class="video-card" src="<?php echo $primeira_aula ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="" align="center" style="margin-top:20px; ">                   
                                     <a href="cursos-do-<?php echo $url ?>" type="button" class="btn btn-primary2">Veja Mais <i class="fa fa-caret-right"></i></a>
                                 </div>

                            </div>
                        </div>
                        <!-- End portfolio-head -->
                        <a href="cursos-do-<?php echo $url ?>" title="Detalhes do Pacote">
                        <div class="portfolio-content" style="text-align: center">
                            <h5 class="title"><?php echo $nome ?></h5>
                            <p style="margin-top:-10px;"><?php echo $desc_rapida ?></p>

                            <?php if($promocao > 0){ ?>
                                <div class="product-bottom-details">
                                    <div class="product-price"><small>De  <?php echo $valorF ?></small>Por R$ <?php echo $promocaoF ?></div>
                                </div>
                            <?php }else{?>
                                <div class="product-bottom-details">
                                    <div class="product-price">R$ <?php echo $valorF ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        </a>
                        <!-- End portfolio-content -->
                    </div>
                    <!-- End portfolio-item -->
                </div>
                

               <?php } ?>

              

            </div>
        </section>


<?php } ?>










<br>
<hr>


<?php
$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' and sistema = 'Não' ORDER BY id desc limit 8");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
?>


    <div class="section-heading" align="center">
        <div class="col-md-12 col-xs-12">
            <h1><small><small><span>Últimos Lançamentos</span> - <a href="lista-cursos">Ver todos os Cursos</a></small></small></h1>

        </div>
    </div>

    <br>
    <hr>





        <section id="portfolio">

        <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-40px;">

            <?php
                for ($i = 0; $i < $total_reg; $i++) {
                foreach ($res[$i] as $key => $value) {}
                $id = $res[$i]['id'];
                $nome = $res[$i]['nome'];
                $desc_rapida = $res[$i]['desc_rapida'];
                $valor = $res[$i]['valor'];
                $foto = $res[$i]['imagem'];
                $promocao = $res[$i]['promocao'];
                $url = $res[$i]['nome_url'];

                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');

                $query2 = $pdo->query("SELECT * FROM aulas where curso = '$id' and num_aula = 1 order by id asc");
                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                $total_reg2 = @count($res2);
                if($total_reg2 > 0){
                $primeira_aula = $res2[0]['link'];
                }else{
                $primeira_aula = "";
                }


                ?>


                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 portfolio-item">
                    <div class="portfolio-one">
                        <div class="portfolio-head">
                            <div class="portfolio-img"><img alt="" src="sistema/painel-admin/img/pacotes/<?php echo $foto ?>"></div>
                            <div class="portfolio-hover">
                               <iframe class="video-card" src="<?php echo $primeira_aula ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="" align="center" style="margin-top:20px; ">                   
                                     <a href="cursos-do-<?php echo $url ?>" type="button" class="btn btn-primary2">Veja Mais <i class="fa fa-caret-right"></i></a>
                                 </div>

                            </div>
                        </div>
                        <!-- End portfolio-head -->
                        <a href="cursos-do-<?php echo $url ?>" title="Detalhes do Curso">
                        <div class="portfolio-content" style="text-align: center">
                            <h5 class="title"><?php echo $nome ?></h5>
                            <p style="margin-top:-10px;"><?php echo $desc_rapida ?></p>

                            <?php if($promocao > 0){ ?>
                                <div class="product-bottom-details">
                                    <div class="product-price">
                                        <small>De  <?php echo $valorF ?></small>
                                        Por R$ <?php echo $promocaoF ?>
                                    </div>
                                </div>
                            <?php }else{?>
                                <div class="product-bottom-details">
                                    <div class="product-price">R$ <?php echo $valorF ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        </a>
                        <!-- End portfolio-content -->
                    </div>
                    <!-- End portfolio-item -->
                </div>
                

               <?php } ?>

              

            </div>
        </section>


<?php } ?>


<br>
<hr>


<?php
require_once("rodape.php");
?>