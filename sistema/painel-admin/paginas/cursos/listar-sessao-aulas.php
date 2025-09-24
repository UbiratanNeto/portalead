<?php
require_once("../../../conexao.php");
$tabela = 'sessao';

$id_curso = $_POST['curso'];

?>

<select class="form-control sel2" name="sessao" id="sessao" style="width:100%;">
									<?php
									$query = $pdo->query("SELECT * FROM sessao where curso = '' order by id asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									if(@count($res) > 0){
									
									for($i=0; $i < @count($res); $i++){
										foreach ($res[$i] as $key => $value) {}
									?>
									<option value="<?php echo $res[$i]['id'] ?>"><?php echo $res[$i]['nome'] ?></option>
									<?php }
									}else{
										echo '<option value="0">Nenhuma Sessão Criada</option>';
									}
									?>
									</select>