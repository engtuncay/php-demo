<?php  
interface sabitler 
{ 
    const siteName = 'www.aspet.net'; 
} 
echo sabitler::siteName."\n"; 
class deneme implements sabitler  
{ 
} 
echo deneme::siteName; 
?>