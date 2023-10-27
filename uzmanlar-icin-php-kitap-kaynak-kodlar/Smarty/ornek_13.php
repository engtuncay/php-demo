<?php
/** 
 * data alımı yapan fonksiyon 
 * 
 * @param string $varName 
 * @param string $varType 
 * @return string 
 */ 
function request($varName, $varType = "GET") 
{ 
    switch ($varType) 
    { 
        case 'GET': 
            if(array_key_exists($varName,$_GET)) 
                $data = addslashes($_GET[$varName]); 
            else  
                $data = false; 
            break; 
        case 'POST': 
            if(array_key_exists($varName,$_POST)) 
                $data = addslashes($_POST[$varName]); 
            else  
                $data = false; 
            break; 
        case 'REQUEST': 
            if(array_key_exists($varName,$_REQUEST)) 
                $data = addslashes($_REQUEST[$varName]); 
            else  
                $data = false; 
            break; 
        case 'COOKIE': 
            if(array_key_exists($varName,$_COOKIE)) 
                $data = addslashes($_COOKIE[$varName]); 
            else  
                $data = false; 
            break; 
        case 'SESSION': 
            if(array_key_exists($varName,$_SESSION)) 
                $data = addslashes($_SESSION[$varName]); 
            else  
                $data = false; 
            break; 
        case "FILE": 
            $data = $_FILES[$varName]; 
            break; 
        default: 
            trigger_error('bilinmeyen bir tip',E_USER_ERROR); 
            break;         
    } 
    if ( $data != false ) 
        return $data; 
    return false; 
}
?>