<?php 
require_once("cabecalho.php");

?>



<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' and sistema = 'Não' ORDER BY id asc limit 12");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading">
        <div class="col-md-12 col-xs-12">
            <h2><small><small><span>Cursos Mais Vendidos</span> - <a href="lista-cursos.php">Ver todos os Cursos</a></small></small></h2>
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

    $valorF = number_format($valor, 2, ',', '.');    
    $promocaoF = number_format($promocao, 2, ',', '.'); 
    

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href=""><img src="sistema/painel-admin/img/cursos/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href=""><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <?php if($promocao > 0){ ?>
                        <div class="product-bottom-details">
                            <div class="product-price"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                        </div>
                        <?php }else{?>
                        <div class="product-bottom-details">
                            <div class="product-price">R$ <?php echo $valorF ?></div>
                        </div>
                        <?php } ?>
                       
                    </div>
                </div>
               </div>

           <?php } ?>

               

               </div>

          

        <?php } ?>










<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM pacotes  ORDER BY id asc limit 12");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading">
                <div class="col-md-12 col-xs-12">
                <h2><small><small><span>Pacotes Mais Vendidos</span> - <a href="pacotes.php">Ver todos os Pacotes</a></small></small></h2>
             
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

    $valorF = number_format($valor, 2, ',', '.');    
    $promocaoF = number_format($promocao, 2, ',', '.'); 
    

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href=""><img src="sistema/painel-admin/img/pacotes/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href=""><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <?php if($promocao > 0){ ?>
                        <div class="product-bottom-details">
                            <div class="product-price"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                        </div>
                        <?php }else{?>
                        <div class="product-bottom-details">
                            <div class="product-price">R$ <?php echo $valorF ?></div>
                        </div>
                        <?php } ?>
                       
                    </div>
                </div>
               </div>

           <?php } ?>

               

               </div>

          

        <?php } ?>









<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' and sistema = 'Não' ORDER BY id desc limit 6");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading">
                <div class="col-md-12 col-xs-12">
                <h2><small><small><span>Últimos Lançamentos</span> - <a href="lista-cursos.php">Ver todos os Cursos</a></small></small></h2>
             
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

    $valorF = number_format($valor, 2, ',', '.');    
    $promocaoF = number_format($promocao, 2, ',', '.'); 
    

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href=""><img src="sistema/painel-admin/img/cursos/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href=""><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <?php if($promocao > 0){ ?>
                        <div class="product-bottom-details">
                            <div class="product-price"><small><?php echo $valorF ?></small>R$ <?php echo $promocaoF ?></div>
                        </div>
                        <?php }else{?>
                        <div class="product-bottom-details">
                            <div class="product-price">R$ <?php echo $valorF ?></div>
                        </div>
                        <?php } ?>
                       
                    </div>
                </div>
               </div>

           <?php } ?>

               

               </div>

          

        <?php } ?>












<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM categorias ORDER BY id asc limit 6");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading">
                <div class="col-md-12 col-xs-12">
                <h2><small><small><span>Principais Categorias</span> - <a href="categorias.php">Ver todos as Categorias</a></small></small></h2>
             
            </div>
        </div>

        <hr>

    
                

      <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-50px;">

                 <?php                 
                    for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
     $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];
    $desc_rapida = $res[$i]['descricao']; 
    $foto = $res[$i]['imagem']; 

    $query2 = $pdo->query("SELECT * FROM cursos where categoria = '$id'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $cursos = @count($res2);
    
       

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href=""><img src="sistema/painel-admin/img/categorias/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href=""><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <div class="product-bottom-details">
                            <div class="product-price"><?php echo $cursos ?> Cursos</div>
                        </div>
                       
                    </div>
                </div>
               </div>

           <?php } 

           
           ?>

               

               </div>

          

        <?php } ?>








<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM linguagens ORDER BY id asc limit 6");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading">
                <div class="col-md-12 col-xs-12">
                <h2><small><small><span>Principais Linguagens</span> - <a href="linguagens.php">Ver todos as Linguagens</a></small></small></h2>
             
            </div>
        </div>

        <hr>

    
                

      <div class="row" style="margin-left:10px; margin-right:10px; margin-top:-50px;">

                 <?php                 
                    for($i=0; $i < $total_reg; $i++){
    foreach ($res[$i] as $key => $value){}
     $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];
    $desc_rapida = $res[$i]['descricao']; 
    $foto = $res[$i]['imagem']; 

    $query2 = $pdo->query("SELECT * FROM pacotes where linguagem = '$id'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $cursos = @count($res2);
    
       

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href=""><img src="sistema/painel-admin/img/linguagens/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href=""><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <div class="product-bottom-details">
                            <div class="product-price"><?php echo $cursos ?> Pacotes</div>
                        </div>
                       
                    </div>
                </div>
               </div>

           <?php } 

           
           ?>

               

               </div>

          

        <?php } ?>



<?php 
require_once("rodape.php");
?>

