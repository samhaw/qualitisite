<?php 
	$conexao = mysqli_connect('mysql.qualitiinternet.com.br', 'qualitiinternet', 'moon@the', 'qualitiinternet');
	mysqli_set_charset($conexao, 'utf8');
	if($conexao->connect_error){
		die("Falha ao realizar a conexão: " . $conexao->connect_error);
	} 
?>