	<!DOCTYPE HTML>
    <html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>QualiTi Internet - Embarque com a gente na velocidade da luz! Tenha QualiTi com você!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style-02.css" rel="stylesheet">
    <link rel="stylesheet" id="prettyphoto-css"  href="css/prettyPhoto.css" type="text/css" media="all">
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
	<link href="css/style-calender-datapicker.css" type="text/css" rel="stylesheet">

    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">  
        <![endif]-->
    <!-- Google Web fonts -->
    <link href="http://fonts.googleapis.com/css?family=Quattrocento:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link href="css/customizacoes-27.css" rel="stylesheet" type="text/css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
		function ObterParametroUrl(parametro) {
			var parametros = window.location.search.substring(1).split("&");
			for (var i = 0; i < parametros.length; i++) {
				var splitParametro = parametros[i].split("=");
				if (splitParametro[0] == parametro) {
					return splitParametro[1];
				}
			}
		}		
		var plano = ObterParametroUrl("plano");
		$(document).ready(function(){	  
			  $('#'+plano).prop('checked', true);
          });
        </script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>v
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <span class="pull-left" id="span-logo">
            <a href="#top"> <img id="logo" src="img/logo-laranja-145px.png" alt="QualiTi Internet"> </a> 
			</span>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a title="Voltar a tela inicial" href="index.php">Início</a></li>
                <li><a title="Solicite agora, é fácil!" href="solicitacao.php">Solicitar serviço</a></li>
                <li><a title="Área exclusiva dos assinantes - Boleto, Relatório, etc" href="http://42d5023a0915.sn.mynetname.net:8081">Área do Assinante</a></li>
                <li><a title="Área exclusiva para funcionários" href="http://webmail.qualitiinternet.com.br">E-mail</a></li>
                <li><a title="Fale conosco" href="index.php#contact">Contato</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->

	<section id="contact" class="single-page form-actions">
      <div class="container">
        <div class="align"><i class="icon-clipboard"></i></div>
        <h1>Solicitação de serviço:</h1>
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              
               <form action="php/smtp-solicitacao.php" method="post" class="cform-form" id="validate">
               <input TYPE="hidden" NAME="redirect" VALUE="https://www.qualitiinternet.com.br/pagina_de_resposta.php">               
               				   
               	<h2>Identificação do contratante:</h2>
               	<hr>
                 <div class="row">
                  <div class="span12"> 
					<div class="row">
						<span class="your-name span6">
							<input type="text" name="nome" placeholder="Nome" class="cform-text" title="Digite seu nome com apenas letras e no mínimo 3 caracteres!" required="required" pattern="^[a-zA-Zà-úÀ-Ú ]{3,}$">
						</span> 
					   <span class="your-name span6">
							<input type="text" name="sobrenome" placeholder="Sobrenome" class="cform-text" size="40" title="Digite seu sobrenome com apenas letras e no mínimo 3 caracteres!" required="required" pattern="^[a-zA-Zà-úÀ-Ú ]{3,}$">
					   </span> 
				  </div>
				<div class="row">
                  <span class="your-tel span6">
                    	<input type="text" id="telefone" name="Telefone" placeholder="Telefone" class="cform-text tel" size="15" title="Informe o Telefone com DDD (Móvel ou Fixo)" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="15">
                  </span> 
				  <span class="your-cel span6">
                    	<input type="text" id="celular" name="Celular" placeholder="Informe o celular" class="cform-text celular" size="15" title="Informe o Celular com o DDD" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="15" required="required">
                  </span> 
			  	</div>
				<div class="row">
					<span class="span12 ajuste-aviso">
						<h6>*As faturas são enviadas somente por e-mail. Se não tiver uma, sugerimos que crie uma no Gmail <strong><a href="https://accounts.google.com/SignUp?service=mail" target="new">clicando aqui</a></strong>, depois é só  voltar neste formulário para concluir o cadastro na QualiTi.</h6>
					</span>
					<span class="your-email span6">
							<input type="text" id="email" name="e-mail" placeholder="Seu E-mail" class="cform-text input-text" size="40" title="Digite um e-mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</span>
		   			<span class="your-email span6">
							<input type="text" id="emailconfirm" name="e-mail" placeholder="Repita seu E-mail" class="cform-text input-text" size="40" title="Seu endereço de e-mail" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
					</span> 					
               	</div>
               	<div class="row">
				   <span class="your-cpf span6">
						<input type="text" name="CPF" placeholder="Informe seu CPF (somente números)" class="cform-text cpf" size="11" title="Seu CPF" maxlength="11" required="required">
				   </span>
                  <span class="your-rg span6">
                    	<input type="text" id="numero-rg" name="RG" placeholder="Número do seu RG" class="cform-text numero-rg" size="13" title="Informe o número do seu RG" maxlength="15" required="required">
                  </span> 
               	</div>
			   	<div class="row">
					<span class="your-nascimento span6">
						<mark> Sua Data de Nascimento</mark><br>
						<input type="date" id="data-nascimento" name="Nascimento" placeholder="Data de nascimento" class="cform-text" size="12" title="Data de nascimento" maxlength="12">			
					</span>			   		
					<span class="your-naturalidade span6">
						<mark>Naturalidade: </mark><br>
						<input type="text" id="data-naturalidade" name="Naturalidade" placeholder="Ou informa o nome da cidade aonde nasceu" class="cform-text" size="30" title="Cidade aonde nasceu" maxlength="30">			
					</span>			   		
			   	</div>              	
               	
               	<h2>Endereço de instalação:</h2>
               	<hr>
               	<div class="row">
					<span class="your-cep span4">
						<input id="cep" type="text" name="CEP" placeholder="CEP" class="cform-text cep" size="15" title="Seu cep" maxlength="15" required="required">
					</span>
			  	</div>
               	<div class="row">
					   <span class="your-endereco span6">
							<input id="rua" type="text" name="endereco" placeholder="Informe seu endereço (Nome da Rua)" class="cform-text" size="40" title="Seu endereço" required="required">
					   </span>
					   <span class="your-numero span2">
							<input type="text" name="Numero" placeholder="Número" class="cform-text" size="5" title="Número" maxlength="5" required="required">
					   </span>
					   <span class="your-complemento span4">
							<input type="text" name="complemento" placeholder="Complemento" class="cform-text" size="5" title="Seu complemento">
					   </span>
               	</div>
               	<div class="row">
					   <span class="your-bairro span4">
							<input id="bairro" type="text" name="bairro" placeholder="Informe seu bairro" class="cform-text" size="40" title="Seu bairro" required="required">
					   </span>
					   <span class="your-cidade span4">
							<input id="cidade" type="text" name="cidade" placeholder="Informe sua cidade" class="cform-text" size="40" title="Sua cidade" required="required">
					   </span>
					   <span class="your-estado span4">
							<input id="uf" type="text" name="estado" placeholder="Estado" class="cform-text" size="5" title="Seu estado" required="required">
					   </span>					   
               	</div>
               	
               	<h2>Qual velocidade você quer?</h2>
               	<h6><!-- mibew text link -->
              	<a id="mibew-agent-button" href="https://www.qualitiinternet.com.br/online/chat?locale=pt-br" target="_blank" onclick="Mibew.Objects.ChatPopups['58b477b239f5bbc2'].open();return false;">chat</a><script type="text/javascript" src="https://www.qualitiinternet.com.br/online/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"58b477b239f5bbc2","url":"https:\/\/www.qualitiinternet.com.br\/online\/chat?locale=pt-br","preferIFrame":false,"modSecurity":true,"width":640,"height":480,"resizable":true,"styleLoader":"https:\/\/www.qualitiinternet.com.br\/online\/chat\/style\/popup"});</script><!-- / mibew text link -->.
              	<br>
              	*Não há taxa de cancelamento. Não exigimos um tempo de fidelidade. O cliente pode cancelar a qualquer momento.
              	<br>
              	</h6>
               	<hr>
				<div class="row">
					<ul class="selecionar">
						<li class="sel pc8Mbps span4">	
							<input type="radio" name="selecionar" id="pc8Mbps" value="Plano 8Mbps">					   
							<label class="span4" for="pc8Mbps">Plano 8Mbps</label>					  					   
						</li>

						<li class="sel pc16Mbps span4" >
							<input type="radio" name="selecionar" id="pc16Mbps" value="Plano 16Mbps">
							<label class="span4" for="pc16Mbps">Plano 16Mbps</label>					   
						</li>

						<li class="sel pc32Mbps span4" >
							<input type="radio" name="selecionar" id="pc32Mbps" value="Plano 32Mbps">			   					   
							<label class="span4" for="pc32Mbps">Plano 32Mbps</label>
						</li>							
					</ul>
               	</div>
               	<hr>

				<div class="row">
					<span class="span4" style="padding-top: 0.3em">Selecione o dia do Vencimento da Mensalidade:</span>
					<span class="span2" style="padding-top: 0.4em">Dia 5:<input style="margin: -0.3em 0 0 2em" type="radio" name="Dia do Vencimento" value="Dia 5"></span>
					<span class="span2" style="padding-top: 0.4em">Dia 10:<input style="margin: -0.3em 0 0 2em" type="radio" name="Dia do Vencimento" value="Dia 10"></span>
					<span class="span2" style="padding-top: 0.4em">Dia 20:<input style="margin: -0.3em 0 0 2em" type="radio" name="Dia do Vencimento" value="Dia 20"></span>
					<span class="span2" style="padding-top: 0.4em">Dia 25:<input style="margin: -0.3em 0 0 2em" type="radio" name="Dia do Vencimento" value="Dia 25"></span>
				</div>	
               	<hr>
				  
					  <h6>1 - A taxa de instalação custa R$ 350. [PROMOÇÃO ENCERRADA!]</h6>
					  <h6>2 - A taxa de instalação poderá ser dividida em até 3x no boleto bancário que vem junto da mensalidade, sendo que a primeira parcela vem junto do primeiro vencimento.</h6>              	
					  <h6>3 - Em algumas instalações a fibra chegará apenas ao DG principal do prédio, ou vila, e deste ponto será distribuido por cabo UTP do tipo metálico. Porém todos os clientes são independentes um do outro. A banda NÃO é compartilhada em nenhuma das situações e o circuito continua mantendo as caracteristica de qualidade da fibra.</h6>
					  <h6>4 - A efetivação da instalação dependerá das condições climáticas, uma vez que desrespeitar tais condições pôem em risco a vida dos técnicos na rua, como; fiação enxarcada, poste molhado, rádios etc. Se isso acontecer comunicaremos o cliente e será reagendada uma nova data.</h6>
					  <h6>5 - É necessário ter uma pessoa MAIOR DE 18 ANOS responsável no local de instalação para receber nossos técnicos.</h6>
               	<hr>
               	<div class="row">
               	<span class="span6">
               		<input type="submit" value="Enviar" class="cform-submit" style="width: 100%">
               	</span>		
               	<span class="span6">               		
              		<input type="reset" value="Limpar" class="cform-submit" style="width: 100%">
               	</span>					
               	</div>
                </div>
			   </div>
              </form>
              
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!--******************** Contact Section ********************-->
        
   
    <hr>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
          <small>&copy; 2016 QualiTi Internet. Todos os direitos reservados. CNPJ: 27.049.552.0001-40</small>
          <br>
		  <small>&phone; Telefones de contato: (11) 2500-2788  /  (11) 97514-9382  / (11) 99598-1294 / (11) 99846-8258</small>		  
        </footer>
      </div>
      <!-- ./container -->
    </div>
    <hr>
    <!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>

	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'Ms4LJIfqgW';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
	<!-- {/literal} END JIVOSITE CODE -->
   
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(["_setAccount", "UA-29231762-1"]);
	  _gaq.push(["_setDomainName", "dzyngiri.com"]);
	  _gaq.push(["_trackPageview"]);
	
	  (function() {
		var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
		ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
		var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
   
	<script type="text/javascript" charset="utf-8">  
		$(document).ready(function(){			
			$("#emailconfirm").blur(function() { 
				if ($("#emailconfirm").val() != $("#email").val()) {	
					bootbox.alert({
						message: "Parece que os campos de e-mail não estão iguais!",
						size: 'small'
					});	
					$(".btn-primary").on( "click", function() {
						$("#email").focus().select();
					});
				}
			});	
			
			
			$('.numero-rg').mask('00.000.000.000.000-0', {reverse: true})
			
			$('.cpf').mask('000.000.000-00', {reverse: true});	
			//$('.date').mask('00/00/0000');
//			$('.cep').mask('00000-000');
//			$('.placeholder').mask("00/00/0000", {placeholder: "Sua data de Nascimento com Mês, Dia e Ano"});
			var SPMaskBehavior = function (val) {
				return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			},
			spOptions = {
				onKeyPress: function(val, e, field, options) {
					field.mask(SPMaskBehavior.apply({}, arguments), options);
				}
			};
			$('.tel, .celular').mask(SPMaskBehavior, spOptions);
			
			function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }			
			//Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado. \nTente corrigir ou ligue para (11) 2500-2788");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("A forma como digitou o CEP foi invalidada pelo sistema. \nTente corrigir ou ligue para (11) 2500-2788");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });	
  		
		/*
						
		function validaEmail(input){ 
			if (input.value != document.getElementById('email').value) {	
			document.getElementById('email').select();
			document.getElementById('email').focused();
			}
		}    
		function validaEmailConfirm(input){ 
			if (input.value != document.getElementById('emailconfirm').value) {
			document.getElementById('emailconfirm').select();
			document.getElementById('emailconfirm').focused();	
			}
		}  
		
		function validaTelefoneConfirm(input){ 
			if (input.value != document.getElementById('telefone').value) {	
			document.getElementById('telefone').select();
			document.getElementById('telefone').focused();
			input.
			}
		} 
		
		function validaTelefone(input){ 
			if (input.value != document.getElementById('telefoneconfirm').value) {
			document.getElementById('telefoneconfirm').select();
			document.getElementById('telefoneconfirm').focused();	
			}
		}  */
 
		
	</script>   
    </body>
    </html>
