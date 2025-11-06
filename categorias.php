<?php 
require_once("cabecalho.php");

?>



<br>
<hr>


<?php 
$query = $pdo->query("SELECT * FROM categorias ORDER BY id asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
   ?>


    <div class="section-heading text-center">
                <div class="col-md-12 col-xs-12">
                <h1><small><span>Categorias</span></small></h1>
             
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
    $url = $res[$i]['nome_url'];

    $query2 = $pdo->query("SELECT * FROM cursos where categoria = '$id'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    $cursos = @count($res2);
    

                  ?>

                <div class="col-md-2 col-sm-6 col-xs-6">    
                <div class="product-card">                  
                    <div class="product-tumb">
                        <a href="categoria-<?php echo $url ?>"><img src="sistema/painel-admin/img/categorias/<?php echo $foto ?>" alt="" width="100%"></a>
                    </div>
                    <div class="product-details">                       
                        <h4><a href="categoria-<?php echo $url ?>"><?php echo $nome ?></a></h4>
                        <p><?php echo $desc_rapida ?></p>
                       
                        <div class="product-bottom-details">
                            <div class="product-price"><?php echo $cursos ?> Cursos</div>
                        </div>
                       
                    </div>
                </div>
               </div>

           <?php } ?>

               

               </div>

          

        <?php } ?>



<?php 
require_once("rodape.php");
?>

