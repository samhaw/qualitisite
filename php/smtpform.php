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
	$recipients ='stheffany@qualitiinternet.com.br,comercial@qualitiinternet.com.br,cristiano@qualitiinternet.com.br,max@qualitiinternet.com.br,samuel@qualitiinternet.com.br';

	# Cabeçalho do e-mail.
	$headers = array
	(
      'From'    => "samuel@qualitiinternet.com.br", # O 'From' é *OBRIGATÓRIO*.
	  'Reply-To' => $_POST['email'], # Responder e-mail para um determinado destinatário
	  'To'      => $recipients,
      'Subject' => $campo[2] #'TITULO DO E-MAIL' # Título do e-mail
	);

	# Define o tipo de final de linha.
	$crlf = "\r\n";

	# Inicio do corpo da Mensagem e texto e em HTML.
	$html = "<HTML><BODY><font color=blue>";
  
	# Loop para enviar os campos por e-mail.
	foreach($_POST as $campo => $valor)
	{	
		if (stristr($valor,"Content-Type")) {
		header("HTTP/1.0 403 Forbidden");
		exit;
		}
		
		if($campo != 'redirect')
		{
		$html .= "<br>---------------------------<br>";
		$html .= ucfirst($campo) . " = $valor";
		}
		
	}
	
	# Fim do corpo da Mensagem e do texto em HTML.
	$html .= "<br>---------------------------";
	$html .= "</font></BODY></HTML>";
    
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
      'username' => 'samuel=qualitiinternet.com.br', # Usuário do SMTP
      'password' => 'josie13,.' # Senha do seu MailBox.
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
else
{
#Caso a página seja chamada por outro método
?>
<html>
<head>
<title>Formul&aacute;rio de contato</title>
</head>
<body>
<FORM ACTION="" METHOD="POST">
  <P> Nome: <BR>
    <INPUT TYPE="text" NAME="nome" SIZE="24">
    <BR>
    E-Mail: <BR>
    <INPUT TYPE="text" NAME="email" SIZE="24">
    <BR>
    Assunto: <BR>
    <INPUT TYPE="text" NAME="assunto" SIZE="24">
    <BR>
    Mensagem: <BR>
    <TEXTAREA NAME="mensagem" ROWS="8" COLS="20"></TEXTAREA>
    <!-- Página de resposta -->
    <INPUT TYPE="hidden" NAME="redirect" VALUE="http://www.qualitiinternet.com.br/pagina_de_resposta.html">
    <INPUT TYPE="submit" VALUE="Enviar">
    <INPUT TYPE="reset" VALUE="Limpar">
  </P>
</FORM>
</body>
</html>
<?php } ?>
