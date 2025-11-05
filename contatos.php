<?php
require_once("cabecalho.php");

?>



<br>
<hr>


<section id="contact-page">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Deixe sua <span>mensagem</span></h2>
            <p class="subheading">Dúvidas? Preencha abaixo ou veja nas <a href="perguntas.php"><span>perguntas frequentes</span></a>, pode também nos chamar no Whatsapp <i class="fa fa-whatsapp" style="color:#044019"></i> <a href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $tel_sistema ?>" target="_blank"><span style="color:#044019"><?php echo $tel_sistema ?></span></a></p>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="form" class="contact-form" name="contact-form" method="post">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>Nome *</label>
                        <input type="text" name="nome" id="nome" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" id="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text"  name="telefone" id="telefone" class="form-control">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Mensagem *</label>
                        <textarea name="mensagem" id="mensagem" required="required" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="btn-enviar" type="button" name="submit" class="btn btn-default submit-button">Enviar <i class="fa fa-caret-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div align="center" id="msg"></div>
    </div>
</section>

<br>
<hr>


<?php
require_once("rodape.php");
?>

<!-- Mascaras JS -->
<script type="text/javascript" src="sistema/js/mascaras.js"></script>
<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<!--AJAX PARA CHAMAR O ENVIAR.PHP DO EMAIL -->
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#btn-enviar').click(function(event){
            event.preventDefault();
            
            $.ajax({
                url: "enviar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){

                    $('#msg').removeClass()

                    if(mensagem.trim() === 'Enviado com Sucesso!'){
                        
                        $('#msg').addClass('text-success')

                       
                        $('#nome').val('');
                        $('#telefone').val('');
                        $('#email').val('');
                        $('#mensagem').val('');
                      
                       
                        //$('#btn-fechar').click();
                        //location.reload();


                    }else{
                        
                        $('#msg').addClass('text-danger')
                    }
                    
                    $('#msg').text(mensagem)

                },
                
            })
        })
    })
</script>
