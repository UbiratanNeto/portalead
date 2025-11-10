<?php 
require_once("cabecalho.php");

?>



<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM pacotes where nome LIKE '%Formação%' ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading text-center">
                <div class="col-md-12 col-xs-12">
                <h2><small><span>Formações Completas</span></small></h2>
             
            </div>
        </div>

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
                $primeira_aula = $res[$i]['video'];
                $url = $res[$i]['nome_url'];

                $valorF = number_format($valor, 2, ',', '.');
                $promocaoF = number_format($promocao, 2, ',', '.');


                ?>


                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 portfolio-item">
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
                        <small>
                        <div class="portfolio-content" style="text-align: center">
                            <h6 style="font-size: 13px" class="title"><?php echo $nome ?></h6>
                            <p style="margin-top:-10px;"><?php echo $desc_rapida ?></p>

                            <?php if($promocao > 0){ ?>
                                <div class="product-bottom-details">
                                    <div class="product-price-menor"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                                </div>
                            <?php }else{?>
                                <div class="product-bottom-details">
                                    <div class="product-price-menor">R$ <?php echo $valorF ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        </small>
                        </a>
                        <!-- End portfolio-content -->
                    </div>
                    <!-- End portfolio-item -->
                </div>
                

               <?php } ?>

              

            </div>
        </section>

          

        <?php }else{
            echo '<h1 align="center">Nenhuma formação cadastrada!</h1>';
        } ?>



<?php 
require_once("rodape.php");
?>

