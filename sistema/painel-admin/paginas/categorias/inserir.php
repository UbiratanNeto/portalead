<?php 
require_once("../../../conexao.php");
$tabela = 'categorias';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$id = $_POST['id'];

//validar email duplicado
$query = $pdo->query("SELECT * FROM $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0 and $res[0]['id'] != $id){
	echo 'Categoria já cadastrada com este nome, escolha Outro!';
	exit();
}

$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['imagem'];
}else{
	$foto = 'sem-foto.png';
}


//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/categorias/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.png"){
				@unlink('../../img/categorias/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}


if($id == ""){

	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, descricao = :descricao, imagem = '$foto'");

}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, descricao = :descricao, imagem = '$foto' WHERE id = '$id'");

}

$query->bindValue(":nome", "$nome");
$query->bindValue(":descricao", "$descricao");
$query->execute();

echo 'Salvo com Sucesso';

?>