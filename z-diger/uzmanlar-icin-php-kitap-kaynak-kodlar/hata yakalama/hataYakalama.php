<?php 
function shutdown(){
	model\ErrorHandler\ErrorLog::setFatalErrorLog();
}
function myErrorHandler($errno, $errmsg, $filename,$linenum, $vars){
	model\ErrorHandler\ErrorLog::errorHandler($errno, $errmsg,$filename, $linenum, $vars);
}
set_error_handler('myErrorHandler');
register_shutdown_function('shutdown');