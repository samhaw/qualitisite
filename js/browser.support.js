/**
 * Suporte aos navegadores.
 * @type Object
 */
var oBrowserSupport = {
    /**
     * Verifica se ainda suportamos o navegador do cliente.
     * @returns {Boolean}
     */
    fnCheck: function () {
        BrowserDetect.init();
        
        if (BrowserDetect.browser == 'Firefox' && BrowserDetect.version < 33) {
            return false;
        }
        
        if (BrowserDetect.browser == 'Explorer' && BrowserDetect.version < 10) {
            return false;
        }
        
        if (BrowserDetect.browser == 'Opera' && BrowserDetect.version < 25) {
            return false;
        }
        
        if (BrowserDetect.browser == 'Chrome' && BrowserDetect.version < 38) {
            return false;
        }
        
        if (BrowserDetect.browser == 'Safari' && BrowserDetect.version < 7) {
            return false;
        }

        return true;
    },
    /**
     * Cria uma div informando que o navegador não é mais suportado.
     * @returns void
     */
    fnCreateBar: function () {
        $('.old-browser-container').prepend('<div class="old-browser-bar"><strong>Atenção:</strong> Este navegador não é mais suportado e pode causar problemas. Considere trocar ou atualizar seu navegador para uma versão mais recente.');
    },
    /**
     * Remove a div de aviso.
     * @returns void
     */
    fnClose: function () {
        $('.old-browser-bar').remove();
    }
};
/**
 * BrowserDetect by QuircksMode
 * @see http://www.quirksmode.org/
 * @type Object
 */
var BrowserDetect = {
    init: function () {
        this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
        this.version = this.searchVersion(navigator.userAgent)
                || this.searchVersion(navigator.appVersion)
                || "an unknown version";
        this.OS = this.searchString(this.dataOS) || "an unknown OS";
    },
    searchString: function (data) {
        for (var i = 0; i < data.length; i++) {
            var dataString = data[i].string;
            var dataProp = data[i].prop;
            this.versionSearchString = data[i].versionSearch || data[i].identity;
            if (dataString) {
                if (dataString.indexOf(data[i].subString) != -1)
                    return data[i].identity;
            }
            else if (dataProp)
                return data[i].identity;
        }
    },
    searchVersion: function (dataString) {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1)
            return;
        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
    },
    dataBrowser: [
        {
            string: navigator.userAgent,
            subString: "Chrome",
            identity: "Chrome"
        },
        {string: navigator.userAgent,
            subString: "OmniWeb",
            versionSearch: "OmniWeb/",
            identity: "OmniWeb"
        },
        {
            string: navigator.vendor,
            subString: "Apple",
            identity: "Safari",
            versionSearch: "Version"
        },
        {
            prop: window.opera,
            identity: "Opera"
        },
        {
            string: navigator.vendor,
            subString: "iCab",
            identity: "iCab"
        },
        {
            string: navigator.vendor,
            subString: "KDE",
            identity: "Konqueror"
        },
        {
            string: navigator.userAgent,
            subString: "Firefox",
            identity: "Firefox"
        },
        {
            string: navigator.vendor,
            subString: "Camino",
            identity: "Camino"
        },
        {// for newer Netscapes (6+)
            string: navigator.userAgent,
            subString: "Netscape",
            identity: "Netscape"
        },
        {
            string: navigator.userAgent,
            subString: "MSIE",
            identity: "Explorer",
            versionSearch: "MSIE"
        },
        {
            string: navigator.userAgent,
            subString: "Gecko",
            identity: "Mozilla",
            versionSearch: "rv"
        },
        {// for older Netscapes (4-)
            string: navigator.userAgent,
            subString: "Mozilla",
            identity: "Netscape",
            versionSearch: "Mozilla"
        }
    ],
    dataOS: [
        {
            string: navigator.platform,
            subString: "Win",
            identity: "Windows"
        },
        {
            string: navigator.platform,
            subString: "Mac",
            identity: "Mac"
        },
        {
            string: navigator.userAgent,
            subString: "iPhone",
            identity: "iPhone/iPod"
        },
        {
            string: navigator.userAgent,
            subString: "iPad",
            identity: "iPad"
        },
        {
            string: navigator.platform,
            subString: "Linux",
            identity: "Linux"
        }
    ]

};