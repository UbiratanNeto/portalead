<?php
require_once("cabecalho.php");
$url = $_GET['url'];
$query = $pdo->query("SELECT * FROM categorias where nome_url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_cat = $res[0]['id'];
$nome_cat = $res[0]['nome'];


$query = $pdo->query("SELECT * FROM cursos where categoria = '$id_cat' ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>

<br>
<hr>

    <div class="section-heading text-center">
                <div class="col-md-12 col-xs-12">
                <h2><small>Cursos da categoria <span><?php echo $nome_cat ?></span></small></h2>
             
            </div>
        </div>

        <hr>

    
                

      <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-50px;">

                 <?php 
                    for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
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

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href="curso-de-<?php echo $url ?>"><img src="sistema/painel-admin/img/cursos/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href="curso-de-<?php echo $url ?>"><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                         <?php if ($promocao > 0) { ?>
                                    <div class="product-bottom-details">
                                        <div class="product-price-menor"><small>De <?php echo $valorF ?></small>Por R$ <?php echo $promocaoF ?></div>
                                    </div>
                                <?php } else { ?>
                                    <div class="product-bottom-details">
                                        <div class="product-price-menor"><span>R$ <?php echo $valorF ?></span></div>
                                    </div>
                                <?php } ?>
                       
                    </div>
                </div>
               </div>

           <?php } ?>

               

               </div>

          

        <?php } else {
            echo '<br><br><h2 align="center">Nenhum curso cadastrado para esta categoria!</h2>';
        }  ?>

<br><hr>

<br><br>


<?php 
require_once("rodape.php");
?>