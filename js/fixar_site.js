var ____prototype_ae_IE9JumpList = ____prototype_ae_IE9JumpList || {};
try{
(function( jumplist ) {
	if ( !navigator.userAgent.toLowerCase().match(/msie (9|10)(\.?[0-9]*)*/) ) {
		return;
	}
          
	var options = {

		// insformações basicas do site
		siteName: 'Ultramail', // Nome do Site
		applicationName: 'Ultramail', // Nome do Site
		startURL: configs.ENDERECO_ULTRAMAIL+'index.php', // URL
		shortcutIcon: configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico', // Icon do site
		tooltip: '',

		// Dynamic jumplist tasks & notifications
		rssFeedURL: 'http://www.buildmypinnedsite.com/RSSFeed?feed=',
		categoryTitle: '', // Task group name
		defaultTaskIcon: '', // Generic task icon

		navButtonColor: true,

		// Jumplist tasks { name: Task Label, action: Task URL, icon: Task Icon }
		staticTasks: [{name: 'HOME',  action: configs.ENDERECO_ULTRAMAIL , icon: configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico', target: 'tab'}],

		// Drag and drop site pinning bar
		prompt: true, // Add a site pinning bar on top of my site pages
		barSiteName: 'WebMail' // Site name as it should appear on the pinning bar
	};
      

	var lib = {
		dom: {
			meta: function(name, content) {
				var meta = document.createElement('meta');
				meta.setAttribute('name', name);
				meta.setAttribute('content', content);
				return meta;
			},
			link: function(rel, href) {
				var link = document.createElement('link');
				link.setAttribute('rel', rel);
				link.setAttribute('href', href);
				return link;
			},
			div: function() {
				return document.createElement('div');
			}
		},
		net: {
			getJSONP: function( URL ) {
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = URL + ( URL.indexOf('?') != -1 ? '&' : '?' ) + Date.now();
				var head = document.getElementsByTagName('head')[0];
				head.insertBefore(script, head.firstChild);
			}
		}
	};

	jumplist.parseRSSFeed = function parseRSSFeed( news ) {
		try {
			if ( window.external.msIsSiteMode() ) {
				window.external.msSiteModeClearJumpList();
				window.external.msSiteModeCreateJumpList( options.categoryTitle );

				try {
					// RSS feeds
					if ( news.rss && news.rss.channel && news.rss.channel.item ) {
						for ( var items = news.rss.channel.item.slice(0, 10), numItems = items.length, i = numItems-1, task, pubDate, taskTitle = ''; i >= 0; i-- ) {
							task = items[i];
							pubDate = Date.parse( task.pubDate );
							taskTitle = task.title ? ( typeof task.title == 'string' ? task.title : task.title['#cdata-section'] || '' ) : '';
							window.external.msSiteModeAddJumpListItem( taskTitle, task.link, options.defaultTaskIcon );
						}
					} else if ( news.feed && news.feed.entry ) { // Atom feeds
						for ( var items = news.feed.entry.slice(0, 10), numItems = items.length, i = numItems-1, task, pubDate, taskTitle = '', link = {};i >= 0; i-- ) {
							task = items[i];
							pubDate = Date.parse( task.published );
							taskTitle = task.title ? ( typeof task.title == 'string' ? task.title : (task.title['#cdata-section'] ? task.title['#cdata-section'] : task.title['#text'] || '')) : '';

							if ( task.link ) {
								if ( typeof task.link == 'string') {
									link['@href'] = task.link || '#';
								} else if ( Object.prototype.toString.call( task.link ) === '[object Array]') {
									link = task.link[0];
								} else {
									link = task.link;
								}
							}

							window.external.msSiteModeAddJumpListItem( taskTitle, link['@href'] || '#', options.defaultTaskIcon );

						}
					}

				} catch ( ex ) {
				}

				window.external.msSiteModeShowJumpList();
			} else {
			}
		}
		catch ( ex ) {
		}
	}

	// Init code
	document.addEventListener('DOMContentLoaded', function() {

		try {
			document.getElementsByTagName('body')[0].onfocus = function() {
				window.external.msSiteModeClearIconOverlay();
			};
		} catch(err) {
		}

		var head = document.getElementsByTagName('head');

		if ( !head ) {
			return;
		}

		head = head[0];

		var links = document.getElementsByTagName('link'), remove = [];

		for ( var i = 0, rel; i < links.length; i++ ) {
			rel = links[i].getAttribute('rel');
			if ( !rel ) {
				continue;
			}
			rel = rel.toLowerCase().replace(/^\s+|\s+$/g, '').replace(/\s+/g, ' ');
			if ( rel == 'icon' || rel == 'shortcut icon' ) {
				remove.push( links[i] );
			}
		}

		for ( i = 0; i < remove.length; i++ ) {
			head.removeChild( remove[i] );
		}

		if ( options.shortcutIcon ) {
			head.appendChild( lib.dom.link('shortcut icon', options.shortcutIcon) );
		}

		head.appendChild( lib.dom.meta('application-name', options.applicationName) );
		head.appendChild( lib.dom.meta('msapplication-tooltip', options.tooltip) );

		if ( options.navButtonColor ) {
			head.appendChild( lib.dom.meta('msapplication-navbutton-color', '#DDDDDD') );
		}

		if ( options.startURL ) {
			head.appendChild( lib.dom.meta('msapplication-starturl', options.startURL) );
		}

		for ( var i = 0, task; i < options.staticTasks.length; i++ ) {
			task = options.staticTasks[i];
			head.appendChild( lib.dom.meta('msapplication-task', 'name=' + task.name + ';action-uri=' + task.action + ';icon-uri=' + task.icon + ';window-type=' + task.target ) );
		}



//		if ( options.prompt && !window.external.msIsSiteMode() && sessionStorage.getItem('hideIE9SitePinningBar') != '1' ) {
//			var bar = lib.dom.div();
//			var barHTML = '<div style="border: 1px solid #E1E1E1; padding: 5px 9px 2px 9px; background: #fff url(http://www.buildmypinnedsite.com/PinImages/Bar/bar-background.png) repeat-x scroll 0 100%;">\n\
//                                          <table cellspacing="0" cellpadding="0" style="width: 100%; border: 0 none; border-collapse: collapse;">\n\
//                                             <tbody><tr><td>\n\
//                                                <div style="background: transparent url(' + options.shortcutIcon.replace(/\.ico$/, ".png") + ') no-repeat scroll 0 3px; background-size: 20px 20px; width: 260px; padding-left: 26px; min-height: 30px; font-weight: bold; font-size:14px;"> \n\
//                                                    Experimente o webMail fixado na barra de tarefa do seu windows!   \n\
//                                                </div></td><td>\n\
//                                                <div style="display: inline-block;padding-right: 40px; position: relative;text-align: right;">\n\
//                                                    <strong style="font-weight: bold; font-size: 18px;">\n\
//                                                        Arraste este icone para sua barra de tarefas \n\
//                                                        <img src="http://www.buildmypinnedsite.com/PinImages/Bar/arrow-icon.png" />\n\
//                                                        </strong>\n\
//                                                        <div style="color:#797c85; font-size: 12px;">ou, <a href="#" onclick="window.external.msAddSiteMode(); return false" style="color: #6CABBA; text-decoration: underline;">\n\
//                                                            click aqui\n\
//                                                        </a> \n\
//                                                            para adicionar o site ao seu menu iniciar\n\
//                                                        </div>\n\
//                                                        <div style="position: absolute; right:-120px; top: -13px; width: 164px; height: 143px; background: transparent url(http://www.buildmypinnedsite.com/PinImages/Bar/drag-icon-placeholder.png) no-repeat scroll 0 0;">\n\
//                                                            <img class="msPinSite" style="position: absolute; top:17px; left:16px;cursor: move; width: 32px; height: 32px;" src="'+configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico" />\n\
//                                                        </div>\n\
//                                                </div>\n\
//                                                </td><td>\n\
//                                                <div onclick="document.getElementById(\'___ie9sitepinning__bar_container\').style.display=\'none\';window.sessionStorage.setItem(\'hideIE9SitePinningBar\', \'1\')" style="background: transparent url(http://www.buildmypinnedsite.com/PinImages/Bar/close-button.png) no-repeat scroll 0 0;position: absolute;top: 0; right: 0;display: block; width: 18px; height: 18px; cursor: pointer; float: right;">\n\
//                                              </div>\n\
//                                            </div></td>\n\
//                                            </tbody>\n\
//                                            </table>\n\
//                                        </div>';
//			bar.setAttribute('style', "position: absolute; top: 0; left: 15%; width: 75%; margin:0; padding:0; border: 0 none; border-bottom:1px solid #707070; color: #1c1f26; background: transparent none no-repeat scroll 0 0; font-family: 'Segoe UI', Arial, tahoma, sans-serif; line-height: 18px; box-shadow: 0 1px 5px rgba(140,140,140,0.7);");
//			bar.id = '___ie9sitepinning__bar_container';
//			bar.innerHTML = barHTML;
//			document.getElementsByTagName('body')[0].appendChild( bar );
//		}
//



		jumplist.poll = function() {
			lib.net.getJSONP( options.rssFeedURL, jumplist.parseRSSFeed );
		};

		window.setTimeout( jumplist.poll, 30 );
	});
})( ____prototype_ae_IE9JumpList );

}catch(e){

  // alert("-");

}


// aqui é criado uma nova lista para o icone fixado na barra de tarefa
//que a ação é feita quando o usuario clica com o btao direito do mouse
try {                                                                            // try catch para verificar se o site vai carregar a funçao  abaixo
 var g_ext = null;                                                               //cria uma variavel  que vai receber o obj window.external
    window.onload = function()                                                       // funcção que carrega junto com a pagina
    {
        try {                                                                        // try catch no caso se o usaurio nao estiver usando o (ie)
            if (window.external.msIsSiteMode()) {                                    //verifica se o site esta fixado na barra de tarefas do windows
                window.external.msSiteModeClearJumpList();                           // limpa a lista
                g_ext = window.external;                                             //gext recebe o obj window. external
                g_ext.msSiteModeCreateJumpList("Ultramail");                           // cria a categoria (WebMail)
//                g_ext.msSiteModeAddJumpListItem(
//                "Preferências", "/webmail/main.php?action='Preferencias'", "/favicon.ico","self");//inseri um item a a lista chamado preferências
                g_ext.msSiteModeAddJumpListItem(
                "Nova mensagem", configs.ENDERECO_ULTRAMAIL+"main.php?action='Nova mensagem'", configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico',"self");//inseri um item a a lista chamado nova mensagem
                  g_ext.msSiteModeAddJumpListItem(
                "Ítens enviados", configs.ENDERECO_ULTRAMAIL+"main.php?action='Itens enviados'", configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico',"self");//inseri um item a a lista chamado nova mensagem
                 g_ext.msSiteModeAddJumpListItem(
                "Caixa de entrada", configs.ENDERECO_ULTRAMAIL+"main.php", configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico',"self");//inseri um item a a lista chamado preferências

            }
        }
        catch (ex) {
           $("head").append('<link  rel=\"shortcut icon\" href="'+configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico" />');
        }
    }

} catch (ex) {
    //  document.all.head.innerHTML+='<link  rel=\"shortcut icon\" href="'+configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico" />';
             //document.writeln('<link  rel=\"shortcut icon\" href="'+configs.ENDERECO_ULTRAMAIL+'templates/default/img/favicon/favicon.ico" />');

    // Fail silently.
}
//
////
//                g_ext.msSiteModeAddJumpListItem(
//                "Ítens enviados", "/webmail/main.php?action='itens_enviados'", "/favicon.ico","self");//inseri um item a a lista chamado nova mensagem
//                 g_ext.msSiteModeAddJumpListItem(
//                "Caixa de entrada", "/webmail/main.php?action='caixa_de_entrada'", "/favicon.ico","self");//inseri um item a a lista chamado preferências
