<?php 
	
include('conecta_mysql.inc.php');


$nome				= 	$_POST['nome'];
$sobrenome			= 	$_POST['sobrenome'];
$telefone			= 	$_POST['telefone'];
$celular			= 	$_POST['celular'];
$email				= 	$_POST['email'];
$cpf				= 	$_POST['cpf'];
$rg					= 	$_POST['rg'];
$nascimento			= 	$_POST['nascimento'];
$naturalidade		= 	$_POST['naturalidade'];
$end_rua			= 	$_POST['rua'];
$end_cep			= 	$_POST['cep'];
$end_numero			= 	$_POST['numero'];
$end_complemento	= 	$_POST['complemento'];
$end_bairro			= 	$_POST['bairro'];
$end_cidade			= 	$_POST['cidade'];
$end_estado			= 	$_POST['estado'];
$plano_dados		= 	$_POST['plano'];
$vencimento			= 	$_POST['vencimento'];

$sql = "INSERT INTO novos_clientes (nome, sobrenome, telefone, celular, email, cpf, rg, nascimento, naturalidade, end_rua, end_cep, end_numero, end_complemento, end_bairro, end_cidade, end_estado, plano_dados, vencimento) VALUES";
$sql .= "('$nome', '$sobrenome', '$telefone', '$celular', '$email', '$cpf', '$rg', '$nascimento', '$naturalidade', '$end_rua', '$end_cep', '$end_numero', '$end_complemento', '$end_bairro', '$end_cidade', '$end_estado', '$plano_dados', '$vencimento')";

if($conexao->query($sql) === TRUE){
	include('smtp-solicitacao.php');
}
 else {
	echo "Erro: " . $sql . "<br>" . $conexao->error;
 }

$conexao->close();

?>