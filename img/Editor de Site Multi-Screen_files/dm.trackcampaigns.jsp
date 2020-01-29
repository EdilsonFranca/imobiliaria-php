










function _getQueryParameter(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.href);
    if (results == null)
        return "";
    else
        return results[1];
}

// expires in days
function _setCookie(name, value, expires, path, domain, secure) {
    var today = new Date();
    today.setTime(today.getTime());
    if (expires)
        expires = expires * 1000 * 60 * 60 * 24;
    var expires_date = new Date(today.getTime() + (expires));
    document.cookie = name + "=" + escape(value)
            + ((expires) ? ";expires=" + expires_date.toGMTString() : "")
            + ((path) ? ";path=" + path : "")
            + ((domain) ? ";domain=" + domain : "")
            + ((secure) ? ";secure" : "");
}

function _getCookie(name) {
    var allCookies = document.cookie.split( ';' );
    var tmpCookie = '';
    var cookieName = '';
    var cookieValue = '';
    var found = false;

    var i=0;
    for (i = 0; i < allCookies.length; i++) {
        tmpCookie = allCookies[i].split( '=' );
        cookieName = tmpCookie[0].replace(/^\s+|\s+$/g, '');
        if ( cookieName == name ) {
            found = true;
            if ( tmpCookie.length > 1 ) {
                cookieValue = unescape( tmpCookie[1].replace(/^\s+|\s+$/g, '') );
            }
            return cookieValue;
        }
        tmpCookie = null;
        cookieName = '';
    }
    if (!found)
        return null;
}

var _deleteCookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;domain=' + dm_track_domain + ';';
};

function dmUTMSetLatest() {
    try {
      // clean all existing dm_utm cookies
      for (i = 0; i < gacps.length; i++) {
          var cookieName = '_dm_' + gacps[i];
          _deleteCookie(cookieName);           
      }
      
      var v = _getCookie('_dm_last_utms');
      if(!v)
        return;
        
      var utms = JSON.parse(v);
      for(var k in utms) {
        if (utms.hasOwnProperty(k)) {
          _setCookie(k, utms[k], 30, '/', dm_track_domain);    
        }
      }
    } catch(e) {
      console.log(e);
    } 
}

var _parseURL = function(href) {
    var l = document.createElement("a");
    l.href = href;
    return l;
};

function trackOrganicReferer() {
  try {
    var rUrl = !document.referrer ? {} : _parseURL(document.referrer);
    if(!rUrl.hostname)
      return;
      
    if (rUrl.hostname.includes('.duda.co') 
        || rUrl.hostname.includes('.dudamobile.com') 
        || rUrl.hostname.includes('editor.meusitenouol.com.br')
        || rUrl.hostname.includes('my.duda.co'))
      return;
    
    var dmUtmSource = _getCookie('_dm_utm_source');
    if(dmUtmSource)
      return;
    
    if(rUrl.hostname)	  
      _setCookie('_dm_utm_source', "Organic[" + rUrl.href.split('://')[1] + "]", 90, '/', dm_track_domain);
	    
  } catch(e) {
    console.log(e);
  } 
}

var dm_last_utms = null;
var gacps = [ "utm_source", "utm_medium", "utm_campaign", "utm_term", "utm_content","referral" ];
var i=0;
var dm_track_domain = 'meusitenouol.com.br';

for (i = 0; i < gacps.length; i++) {
    var cookieName = '_dm_' + gacps[i];
    
    if ((v = _getQueryParameter(gacps[i])) != "") {
      if (_getCookie(cookieName) == null) {
        // hack for not setting cookie for intuit referral
      	if(gacps[i] == 'referral' && v.toLowerCase() == 'intuit') {
      		continue;
      	}
        _setCookie(cookieName, v, 90, '/', dm_track_domain);
      } 
        
      if(dm_last_utms == null)
        dm_last_utms = {};
      
      dm_last_utms[cookieName] = v;
    }
}

if(dm_last_utms != null) {
  _setCookie('_dm_last_utms', JSON.stringify(dm_last_utms), 30, '/', dm_track_domain);
} else {
  trackOrganicReferer();
}


        _setCookie('_platform_new_pricing', 'true', 365, '/', dm_track_domain);
        
