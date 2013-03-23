window.log = function(){
  log.history = log.history || [];  
  log.history.push(arguments);
  arguments.callee = arguments.callee.caller;  
  if(this.console) console.log( Array.prototype.slice.call(arguments) );
};

(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c})(window.console=window.console||{});

function trim (str, charlist) {
    var whitespace, l = 0,
        i = 0;
    str += '';
 
    if (!charlist) {
        // default list
        whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
    } else {
        // preg_quote custom list
        charlist += '';
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
    }
 
    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }
 
    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }
 
    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}

(function($){
    var _dataFn = $.fn.data;
    $.fn.data = function(key, val){
        if (typeof val !== 'undefined'){ 
            $.expr.attrHandle[key] = function(elem){
                return $(elem).attr(key) || $(elem).data(key);
            };
        }
        return _dataFn.apply(this, arguments);
    };
})(jQuery);

$(function() {
	$('.hover-class').livequery(function(){
		
	$(this).hover(
		function(){
			$(this).addClass('hover');
		},
		function(){
			$(this).removeClass('hover');
		});
	});
});


(function($){

    // Extend jQuery's native ':'
    $.extend($.expr[':'],{
 
        // New method, "data"
        data: function(a,i,m) {
 
            var e = $(a).get(0), keyVal;
 
            // m[3] refers to value inside parenthesis (if existing) e.g. :data(___)
            if(!m[3]) {
 
                // Loop through properties of element object, find any jquery references:
                for (var x in e) { if((/jQuery\d+/).test(x)) { return true; } }
 
            } else {
 
                // Split into array (name,value):
                keyVal = m[3].split('=');
 
                // If a value is specified:
                if (keyVal[1]) {
 
                    // Test for regex syntax and test against it:
                    if((/^\/.+\/([mig]+)?$/).test(keyVal[1])) {
                        return
                         (new RegExp(
                             keyVal[1].substr(1,keyVal[1].lastIndexOf('/')-1),
                             keyVal[1].substr(keyVal[1].lastIndexOf('/')+1))
                          ).test($(a).data(keyVal[0]));
                    } else {
                        // Test key against value:
                        return $(a).data(keyVal[0]) == keyVal[1];
                    }
 
                } else {
 
                    // Test if element has data property:
                    if($(a).data(keyVal[0])) {
                        return true;
                    } else {
                        // If it doesn't remove data (this is to account for what seems
                        // to be a bug in jQuery):
                        $(a).removeData(keyVal[0]);
                        return false;
                    }
 
                }
            }
 
            // Strict compliance:
            return false;
 
        }
 
    });
})(jQuery);

function mod(a, b) {
  var c = a % b;
  return (c < 0) ? c + b : c;
}

function CreateNewLikeButton(url,container)
{
    var elem = $(document.createElement("fb:like"));
    elem.attr("href", url);
    elem.attr("send", "false");
    elem.attr("layout", "button_count");
    elem.attr("show_faces", "false");
    container.empty().append(elem);
    FB.XFBML.parse(container.get(0));
}

function strpos (haystack, needle, offset) {
    var i = (haystack+'').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}

function in_array (needle, haystack, argStrict) {
    var key = '', strict = !!argStrict;
 
    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }
 
    return false;
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function convert_qs(query) {
	var qsParm = {},
		parms = query.split('&');
		
	for (var i=0; i<parms.length; i++) {
		var pos = parms[i].indexOf('=');
		if (pos > 0) {
			var key = parms[i].substring(0,pos);
			var val = parms[i].substring(pos+1);
			qsParm[key] = val;
		}
	}
	
	return qsParm;
} 

function checkEmail(inputvalue){	
    var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(pattern.test(inputvalue)){         
		var good = true; 
    }else{   
		var good = false;
    }
    
    return good;
}

function empty (mixed_var) {
    var key;
 
    if (mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false || typeof mixed_var === 'undefined') {
        return true;
    }
 
    if (typeof mixed_var == 'object') {
        for (key in mixed_var) {
            return false;
        }
        return true;
    }
 
    return false;
}

$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
    
}

var serialize = function(obj, re) {
    var result = [];
    $.each(obj, function(i, val) {
        if ((re && re.test(i)) || !re)
            result.push(i + ': ' + (typeof val == 'object' ? val.join 
                ? '\'' + val.join(', ') + '\'' : serialize(val) : '\'' + val + '\''));
    });
    return '{' + result.join(', ') + '}';
};

function htmlentities (string, quote_style, charset, double_encode) {
    var hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style),
        symbol = '';
    string = string == null ? '' : string + '';

    if (!hash_map) {
        return false;
    }
    
    if (quote_style && quote_style === 'ENT_QUOTES') {
        hash_map["'"] = '&#039;';
    }
    
    if (!!double_encode || double_encode == null) {
        for (symbol in hash_map) {
            if (hash_map.hasOwnProperty(symbol)) {
                string = string.split(symbol).join(hash_map[symbol]);
            }
        }
    } else {
        string = string.replace(/([\s\S]*?)(&(?:#\d+|#x[\da-f]+|[a-zA-Z][\da-z]*);|$)/g, function (ignore, text, entity) {
            for (symbol in hash_map) {
                if (hash_map.hasOwnProperty(symbol)) {
                    text = text.split(symbol).join(hash_map[symbol]);
                }
            }
            
            return text + entity;
        });
    }

    return string;
}

function urlencode (str) {
    str = (str + '').toString();

    // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
    // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').
    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}

function checkForm(form, ajax){

	var submit_ok = true;
	
	form.find('input, textarea, select').each(function(){
		var $this = $(this);
		$this.removeClass('missing');
		
		if($this.hasClass('required') && $this.val() == ""){
			$this.addClass('missing');
			submit_ok = false;
		}
		
		if($this.hasClass('email') && !checkEmail($this.val())){
			$this.addClass('missing');
			submit_ok = false;
		}
	});
	
	if(!submit_ok) return false;
	else return true;
	//if(submit_ok){  log('submitted'); }//form.submit(); }
	
}

function highestZ(obj){

	var largestZ = 1; // this is the min z-index you would want to
   	$(".block").each(function(i) {
   		$(this).removeClass('highlight');
      	var currentZ = parseFloat($(this).css("zIndex"));
      	largestZ = currentZ > largestZ ? currentZ : largestZ;
   });
  	obj.css("z-index", largestZ + 1);
	obj.addClass('highlight');
}

function get_youtube(vidid,maxwidth,classe){
	$.ajax({
	  url: 'http://www.youtube.com/oembed?url=http%3A//www.youtube.com/watch?v%3D'+vidid+'&format=json',
	  success: function(data){
	  	 var width = (maxwidth) ? maxwidth : data.width;
	  	 var height = (maxwidth) ? data.height / data.width * maxwidth : data.height;
	  	 var cl = (classe) ? ' class="'+classe+'"' : "";
	  	 
	  	 log('<iframe width="'+maxwidth+'" height="'+height+'" '+cl+' src="http://www.youtube.com/embed/'+vidid+'" frameborder="0" allowfullscreen></iframe>');
	  },
	  dataType: 'json'
	});
}

function ReinitializeAddThis(){ 

	if (window.addthis) {
		window.addthis = null;
		window._adr = null;
		window._atc = null;
		window._atd = null;
		window._ate = null;
		window._atr = null;
		window._atw = null;
	}

	$.getScript('http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f9972685f0eaa50#domready=1',function(){
		 window.addthis.ost = 0;
		 window.addthis.ready();
	});
}

$.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options = $.extend({}, options); // clone object since it's unexpected behavior if the expired property were changed
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // NOTE Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = $.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
