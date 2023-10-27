AJAX = {
  returns:'',
  createRequestObject:function(){
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
      try{
        return new ActiveXObject("Msxml2.XMLHTTP");
      }catch(e){
        try{
          return new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
           alert("Browser'iniz AJAX desteği bulunmamaktadır");
	return false;
        }
      }
      return false;
    }else{
      return new XMLHttpRequest();
    }
  },
  connection:function(url,parameters,funcObj,method){		
    if( method == 'POST' ){
      http.open(method,url,true);
      http.setRequestHeader('Content-type','application/x-www-form-urlencoded;  charset=UTF-8');
      http.setRequestHeader("Content-length", parameters.length);
      http.setRequestHeader("Connection", "close");
    }else{
      url += '?'+parameters;
      http.open(method,url,true);
      http.setRequestHeader("Content-Type","text/xml; charset=utf-8"); 
      parameters=null;
    }
    http.setRequestHeader("Connection", "close");
    if(funcObj)
      http.onreadystatechange = funcObj;
    else
      http.onreadystatechange = L.AJAX.defaultFunc;
    http.send(parameters);
    return true;
  },
  defaultFunc:function(){
    if(http.readyState == 4 ){
      AJAX.returns = eval('(' + http.responseText + ');');			
      if( L.AJAX.returns.js.jsFunction)
        eval(L.AJAX.returns.js.jsFunction+"();");
      else
        AJAX.returns.js.jsFunction();
    }
  }
}
var http = AJAX.createRequestObject();
