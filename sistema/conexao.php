<?php
/*
//servidor local
$usuario = 'root';
$senha = '';
$banco = 'portal';
$servidor = 'localhost';
*/

//servidor hostgator
$usuario = 'hg171165_portalead';
$senha = 'portalead';
$banco = 'hg171165_portalead';
$servidor = 'localhost';

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados!<br><br>' . $e;
}

$url_sistema = "http://$_SERVER[HTTP_HOST]/";
$url = explode("//", $url_sistema);
if ($url[1] == 'localhost/') {
	$url_sistema = "http://$_SERVER[HTTP_HOST]/gestaodecursos/";
}

//VARIÁVEIS DO SISTEMA
$nome_sistema = 'Portal Hugo Cursos';
$email_sistema = 'contato@hugocursos.com.br';
$tel_sistema = '(31) 00000-0000';


//INSERIR DADOS INICIAIS NA TABELA CONFIG
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if (@count($res) == 0) {

	$pdo->query("INSERT INTO config SET nome_sistema = '$nome_sistema', tel_sistema = '$tel_sistema', email_sistema = '$email_sistema', logo = 'logo.png',
	 icone = 'favicon.ico', logo_rel = 'logo.jpg', itens_pag = '18' ");
} else {
	$nome_sistema = $res[0]['nome_sistema'];
	$email_sistema = $res[0]['email_sistema'];
	$tel_sistema = $res[0]['tel_sistema'];
	$cnpj_sistema = $res[0]['cnpj_sistema'];
	$tipo_chave_pix = $res[0]['tipo_chave_pix'];
	$chave_pix = $res[0]['chave_pix'];
	$facebook_sistema = $res[0]['facebook'];
	$instagram_sistema = $res[0]['instagram'];
	$youtube_sistema = $res[0]['youtube'];
	$itens_pag = $res[0]['itens_pag'];
}
