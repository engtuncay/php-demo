<html> 
 <head> 
   <title>Smarty</title> 
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 </head>
<body> 
Benim Adım : {$name} <br /> 
{section name=n loop=$arr} 
    {$arr[n].id}<br /> 
{/section} 
</body> 
</html>
