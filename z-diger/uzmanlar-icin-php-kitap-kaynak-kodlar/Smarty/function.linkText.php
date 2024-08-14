<?php
function smarty_function_linkText($params, &$smarty) 
{ 
    if($params['url']== $_GET['Type']) 
        printf('<span class="black">%s</span>',$params['title']); 
    else  
        printf('<a href="/%s">%s</a>',$params['url'],$params['title']); 
}
?>