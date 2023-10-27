<?php  

define('ROOT_PATH','/home/mehmet/abc.net'); 
require_once (ROOT_PATH . 'public_html/smarty/libs/Smarty.class.php'); 
$SMARTY =& Loader::loadClass("db");
/* smarty tanımlamaları */
$SMARTY->template_dir = ROOT_PATH . '/public_html/smarty/template/'; 
$SMARTY->compile_dir = ROOT_PATH . '/template_c/'; 
$SMARTY->config_dir = ROOT_PATH . '/config/'; 
$SMARTY->cache_dir = ROOT_PATH . '/cache/'; 
?>