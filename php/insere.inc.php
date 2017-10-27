<?php 
	
include('conecta_mysql.inc.php');

$Nome				= 	ucwords(strtolower($_POST['Nome']));
$Sobrenome			= 	ucwords(strtolower($_POST['Sobrenome']));
$Telefone			= 	$_POST['Telefone'];
$Celular			= 	$_POST['Celular'];
$Email				= 	$_POST['E-mail'];
$Cpf				= 	$_POST['CPF'];
$Rg					= 	$_POST['RG'];
$Nascimento			= 	$_POST['Nascimento'];
$Rua				= 	ucwords(strtolower($_POST['Rua']));
$CEP				= 	$_POST['CEP'];
$Numero				= 	$_POST['Numero'];
$Complemento		= 	ucwords(strtolower($_POST['Complemento']));
$Bairro				= 	ucwords(strtolower($_POST['Bairro']));
$Cidade				= 	ucwords(strtolower($_POST['Cidade']));
$Estado				= 	strtoupper(($_POST['Estado']));
$Plano				= 	$_POST['Plano'];
$Vencimento			= 	$_POST['Vencimento'];
$Desconto			= 	$_POST['Desconto'];
$Pagamento			= 	$_POST['Pagamento'];

$sql = "INSERT INTO novos_clientes (Nome, Sobrenome, Telefone, Celular, Email, Cpf, Rg, Nascimento, Rua, CEP, Numero, Complemento, Bairro, Cidade, Estado, Plano, Vencimento, Desconto, Pagamento) VALUES";
$sql .= "('$Nome', '$Sobrenome', '$Telefone', '$Celular', '$Email', '$Cpf', '$Rg', '$Nascimento', '$Rua', '$CEP', '$Numero', '$Complemento', '$Bairro', '$Cidade', '$Estado', '$Plano', '$Vencimento', '$Desconto', '$Pagamento')";

if($conexao->query($sql) === TRUE){
	include('smtp-solicitacao.php');
}
 else {
	echo "Erro: " . $sql . "<br>" . $conexao->error;
 }

$conexao->close();

?>