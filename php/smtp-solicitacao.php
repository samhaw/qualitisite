<?php

# Verifica o método pelo qual a página foi chamada
if(strtolower($_SERVER['REQUEST_METHOD']) == "post"){

  ##---------------------------------------------------
  ##  Envio de Emails pelo SMTP Autênticado usando PEAR
  ##---------------------------------------------------
  # Mais detalhes sobre o PEAR: 
  #   http://pear.php.net/
  #
  # Mais detalhes sobre o PEAR Mail:
  #   http://pear.php.net/manual/en/package.mail.mail-mime.php
  ##---------------------------------------------------
  
  	# Faz o include do PEAR Mail e do Mime.
	include ("Mail.php");
	include ("Mail/mime.php");

	#E-mail de destino. Caso seja mais de um destino, crie um array de e-mails.
	$recipients ='samuel@qualitiinternet.com.br, stheffany@qualitiinternet.com.br, cristiano@qualitiinternet.com.br';

	# Cabeçalho do e-mail.
	$headers = array
	(
      'From'    => "webmaster@qualitiinternet.com.br", # O 'From' é *OBRIGATÓRIO*.
	  'Reply-To' => $_POST['email'], # Responder e-mail para um determinado destinatário
	  'To'      => $recipients,
      'Subject' => "Formulario de Solicitacao - QualiTi" #'TITULO DO E-MAIL' # Título do e-mail
	);

	# Define o tipo de final de linha.
	$crlf = "\r\n";

	# Inicio do corpo da Mensagem e texto e em HTML.
	$html = "    
			<html lang='pt-br'>
			<head>
			<meta charset='utf-8'>
			<title>QualiTi Internet - Embarque com a gente na velocidade da luz! Tenha QualiTi com você!</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<meta name='description' content=''>
			<meta name='author' content=''>
			<link href='https://www.qualitiinternet.com.br/css/bootstrap.css' rel='stylesheet'>
			<link href='https://www.qualitiinternet.com.br/css/style-06.css' rel='stylesheet'>
			<link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet'
			<link href='https://www.qualitiinternet.com.br/css/prettyPhoto.css' rel='stylesheet'
			<link href='https://www.qualitiinternet.com.br/css/fontello.css' rel='stylesheet'
			<link href='https://www.qualitiinternet.com.br/css/bootstrap-responsive.01' rel='stylesheet'	
    		<link href='https://www.qualitiinternet.com.br/css/customizacoes-32.css' rel='stylesheet' type='text/css'>
			</head>
			<body style='background-color: #DFDFDF'>
			<div id='headerwrap'>
			<header class='clearfix'>
			<h2>Novo Cliente - Acelera QualiTi</h2>
			<div class='row span12'>
			<span class='span6'>
			";
  
	# Loop para enviar os campos por e-mail.
	foreach($_POST as $campo => $valor)
	{	
		if (stristr($valor,"Content-Type")) {
		header("HTTP/1.0 403 Forbidden");
		exit;
		}
		
		if($campo != 'redirect')
		{
		$html .= "<span style='	background-color: #0b333f;
				filter:opacity(alpha=10);
				-moz-opacity:1;
				opacity:0.7;
				box-shadow: color black;
				border-radius: 0.8em 0.8em 0 0;
				text-align: center;
				width: 100%;
				padding-left: 3em;
				padding-right: 3em;
				color: #FFFFFF;'>
				";
		$html .= ucfirst($campo);
		$html .= "</span>";
		$html .= "<p style='background-color: #FFFFFF; margin-bottom: 2.5em;'>";
		$html .= $valor;
		$html .= "</p>";
		}
	}
	
	# Fim do corpo da Mensagem e do texto em HTML.
	$html .= "	
	<br>
	</span>
	</div>
	</header>
	</div>
	<div class='footer-wrapper' style='text-align: center'>
    <small style='text-align: center'>&copy; 2016 QualiTi Internet. Todos os direitos reservados. CNPJ: 27.049.552.0001-40</small>
  	<br>
  	<small style='text-align: center'>Telefones de contato: (11) 2500-2788  /  (11) 97514-9382  / (11) 99598-1294 / (11) 99846-8258</small>		  
	</footer>
  	</div>
	</html>	
	";
    
	# Instancia a classe Mail_mime.
	$mime = new Mail_mime($crlf);

	# Coloca o HTML no email
	$htmlutf8 = utf8_decode($html);
	$mime->setHTMLBody($htmlutf8);

	# Procesa todas as informações.
	$body = $mime->get();
	$headers = $mime->headers($headers);

	# Parâmetros para o SMTP. *OBRIGATÓRIO*
	$params = array
	(
      'auth' => true, # Define que o SMTP requer autenticação.
      'host' => 'smtp.qualitiinternet.com.br', # Servidor SMTP
      'username' => 'webmaster=qualitiinternet.com.br', # Usuário do SMTP
      'password' => 'HaZ)vUJ[6f' # Senha do seu MailBox.
    );
    
	# Define o método de envio
	$mail_object =& Mail::factory('smtp', $params);

	# Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um
	# objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.
	$result = $mail_object->send($recipients, $headers, $body);
	if (PEAR::IsError($result))
	{
	# Caso apresente erro no envio do e-mail exibe a mensagem abaixo
	echo "ERRO ao tentar enviar o email. (" . $result->getMessage(). ")";
	}
	else
	{
	# Caso o envio seja realizado com sucesso, o usuário será redirecionado para o valor da variável $redirect
  	$redirect = $_POST['redirect'];
    header("Location: $redirect");
	exit;
	}

}
?>