<html>
 <head>
  <title>Ajax Örneği 2</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="/js/ajax.js"></script>
 </head>
<body>
<script type="text/javascript">
function parsing(){
 if(http.readyState == 4){
  if(http.status == 200){
    var data = eval('(' + http.responseText + ');');            
    var len = data.isimler.length;
    for(var i=0;i<len;i++)
      alert(data.isimler[i]);
  }
 }
}
</script>
<input type="button" value="Tıkla" onclick="AJAX.connection('veri.php','','','POST')" />
</body>
</html>
