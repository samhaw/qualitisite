<!DOCTYPE html>
<html>
<head>
	<title>Verifica</title>
	<meta charset="utf-8">
</head>
<body>
<?php 
	
	
$nome				= 	$_GET['nome'];
$sobrenome			= 	$_GET['sobrenome'];
$telefone			= 	$_GET['telefone'];
$celular			= 	$_GET['celular'];
$email				= 	$_GET['email'];
$cpf				= 	$_GET['cpf'];
$rg					= 	$_GET['rg'];
$nascimento			= 	$_GET['nascimento'];
$naturalidade		= 	$_GET['naturalidade'];
$end_rua			= 	$_GET['rua'];
$end_cep			= 	$_GET['cep'];
$end_numero			= 	$_GET['numero'];
$end_complemento	= 	$_GET['complemento'];
$end_bairro			= 	$_GET['bairro'];
$end_cidade			= 	$_GET['cidade'];
$end_estado			= 	$_GET['estado'];
$plano_dados		= 	$_GET['plano'];
$vencimento			= 	$_GET['vencimento'];
$erro			= 0;
	
//Verifica se o campo nome não está em branco
if (empty($nome)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($sobrenome)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}//Verifica se o campo nome não está em branco
if (empty($telefone)) {
	echo "Favor digitar o seu telefone.<br>";
	$erro = 1;
}
if (empty($celular)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}//Verifica se o campo nome não está em branco
if (empty($email)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($cpf)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}//Verifica se o campo nome não está em branco
if (empty($rg)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($nascimento)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}//Verifica se o campo nome não está em branco
if (empty($naturalidade)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($end_rua)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}
if (empty($end_cep)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($end_numero)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}
if (empty($end_complemento)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($end_bairro)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}
if (empty($end_cidade)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($end_estado)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}
if (empty($plano_dados)) {
	echo "Favor digitar o seu nome corretamente.<br>";
	$erro = 1;
}
if (empty($vencimento)) {
	echo "Favor digitar o seu sobrenome corretamente.<br>";
	$erro = 1;
}
if ($erro == 0) {
	echo "Todos os dados foram digitados corretamente.<br>";
	include("insere.inc.php");
}	

 ?>
</body>
</html>