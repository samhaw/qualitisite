var Login = {

    init: $(function(){
        if (self != top) {
            top.location.href=self.location.href;
            document.close();
        } //Evitar que o login abra num frame

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            
            //esconde todo o contudo
            $('*').remove();
            //redireciona pra pagina mobile
            window.location = 'ultramail/mobile'; 
        }
        
        if (!oBrowserSupport.fnCheck()) {
            oBrowserSupport.fnCreateBar();
        }

        //define o caminho das imagens a partir do pixel ratio
        if (window.devicePixelRatio >= 2) {
            var imgfolder = 'bg_retina';
        }
        else {
            var imgfolder = 'bg';
        }
        
        var images = ['bg01.jpg', 'bg02.jpg', 'bg03.jpg', 'bg04.jpg'];
        
        if (!window.location.origin) {
            window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
        }

        //coloca uma imagem de fundo randomica sempre que entrar na tela de login
        $('body').css({'background-image': 'url('+window.location.origin+'/ultramail/templates/login/images/' + imgfolder + '/' + images[Math.floor(Math.random() * images.length)] + ')'});

        Login.setEvents();
    }),
    
    setEvents: function(){

        $('input[name="salvaremail"]').on('change', function(){
            var value = ($(this).val() == 0) ? 1 : 0 ;
            $(this).val(value);
        });               
        
        $('#form_login').on('submit', function( submitEvent ){ 

            if(Login.prepLoging( submitEvent )){

                var form = $(this);
                
                var formAction = $(location).attr('href').split('?')[0] + $('#form_login').attr('action');
                
                var email       = $('input[name="email"]').val();
                var senha       = $('input[name="senha"]').val();
                var salvaremail = $('input[name="salvaremail"]').val();
                var loginPermanente = ($('input[name="loginPermanente"]').is(':checked')) ? 1 :0;

                var fromURI    = $('input[name="fromURI"]').val();
                var fromForm   = $('input[name="fromForm"]').val();
                

                $.ajax({
                    url: formAction,
                    type: "POST",
                    data : {
                        'email' : email,
                        'senha' : senha,
                        'salvaremail' : salvaremail,
                        'loginPermanente' : loginPermanente,
                        'fromURI' : fromURI,
                        'fromForm' : fromForm
                    },
                    success : function(JsonData){

                        var msgErro = ""; 
                        
                        //erro ao se conectar ao servidor
                        if('erro : 1'.indexOf(JsonData) > -1){
                            msgErro += "Erro ao se conectar no servidor.";
                        }
                        //senha invalida
                        if('erro : 2'.indexOf(JsonData) > -1){
                            msgErro += "Senha inválida.";
                        }
                        //erro desconhecido
                        if('erro : 3'.indexOf(JsonData) > -1){
                            msgErro += "Erro de servidor desconhecido. Por favor, tente novamente.";
                        }
                        //registro da sessao expirou
                        if('erro : 4'.indexOf(JsonData) > -1){
                            msgErro += "O registro da sessão foi encerrado. Por favor faça login novamente.";
                        }
                        
                        //se houve algum erro no login
                        if(msgErro !=""){

                            //remove a mensagem de erro anterior - se houver
                            $('.error').remove();
                            
                            //cria a div com a mensagem de erro
                            $('<div class="request-response error"><ul style="padding: 0; margin: 0 10px;"><li>' + msgErro + '</li></ul></div>').appendTo('#form_login');
                            
                            //nao deixa submitar
                            return false;
                        }

                        //se chegou aqui loga normal...

                        //pega o servidor em que a conta que esta logando esta atrelada
                        var StServidor = JsonData;
                        
                        //monta a url da action para fazer login no servidor correto
                        if(window.location.origin.search('.prv.digirati.com.br')!==-1){
                            //Copias de testes
                           var StNovaAction = StServidor + '/login.php';
                        }else{
                            //Servidores corretos
                           var StNovaAction = StServidor + '/ultramail/login.php'; 
                        }
                        
                        //var StNovaAction = 'login.php'; ##debug##
                        

                        //cria um form novo com os dados do form preenchido
                        var novoForm = form.clone();
                        
                        //muda a action do form clonado para o endereco do servidor certo
                        novoForm.attr('action', StNovaAction);

                        //eh preciso adicionar o form ao documento html senao o IE  e FF nao fazem o submit 
                        $('body').append(novoForm.css('display', 'none'));
                        
                        //marca o checkbox do form clonado
                        if(loginPermanente){

                            novoForm.find('#ck_loginpermanente').prop( "checked", true );
                            
                            //adiciona o servidor em que esta fazendo o login para criar o cookie no servidor que sera redirecionado
                            novoForm.append('<input type="hidden" name="StServidorOrigem" value="'+ document.domain + location.pathname +'">');

                            //cria o cookie com o endereco do servidor de redirecionamento
                            $.cookie('StServidor', StServidor, {path : '/', expires : 90});

                        }
                        
                        //faz o login
                        novoForm.find('#submit').trigger('click');


                    }
                    
                });


return false;
}

});
},

checkMailFormat:function( mail ){
    var atpos=mail.indexOf("@");
    var dotpos=mail.lastIndexOf(".");
    if ( atpos !== -1 && ( dotpos<atpos+2 || dotpos+2>=mail.length ) ){
        return false;
    }
    return true;
},

prepLoging: function( submitEvent ){
    var login = $('#txt_email').val(),
    password = $('#txt_senha').val();
    if( !Login.checkMailFormat(login) || password.replace(' ','') == '' ){
        submitEvent.preventDefault();
        alert( 'Por favor preencha seu login e senha corretamente!' );
        return false;
    }
    return true;
}

}
