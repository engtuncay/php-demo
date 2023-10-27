<?php 
$host="127.0.0.1"; 
$port="11211"; 
$session_save_path = "tcp://$host:$port?persistent=1&weight=2&timeout=2&retry_interval=10"; 
ini_set('session.save_handler', 'memcache'); 
ini_set('session.save_path', $session_save_path); 
?>