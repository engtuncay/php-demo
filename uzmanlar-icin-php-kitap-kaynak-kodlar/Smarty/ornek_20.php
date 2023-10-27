<?php
/**
 * random image oluşturur
 *
 * @param integer $strlen
 * @return void
 */
function imageVerification($strlen=5)
{    
    $alphanum  = "ABCDEFGHJKLMNPQRTXYZ2346789"; 
    $randText = substr(str_shuffle($alphanum), 0, $strlen); 
    $image = imagecreate(110, 40);
    $color = imagecolorallocate($image, 120, 120, 120);
    $insertfile_id = imagecreatefromgif(ROOT_PATH.'/img/img_bg.gif');
    imagecopy($image,$insertfile_id,0,0,0,0,110, 40);
    $start=5;
    for ($i=0; $i<$strlen; $i++)
    {
        $size=rand(13,18);
        $rotaion=rand(-20,20);
        imagettftext($image, $size, $rotaion, $start, 30, $color, "font/comic.ttf", $randText[$i]);
        $start+=20;
    }
    session::createSession(array('security_code',md5(session::getSessionId().$randText)));
    header ("Content-type: image/jpeg");
    imagejpeg($image,'',100);
    imagedestroy($image);
}
?>