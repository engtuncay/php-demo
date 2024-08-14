<?php
function isBotRobot()
{
    $machStr="/Google|gsa\\-crawler|Alexa|MSN|Fast Crawler|BilgiBot|Hakia|findlinks|ConveraCrawler|Slurp|Inktomi|yahoo|slurp|Lycos|Infoseek|Scooter|Alta Vista|ia\\_archiver/";
    $agent=@$_SERVER["HTTP_USER_AGENT"];
    $url = @$_SERVER["REQUEST_URI"];
    
    if ( preg_match($machStr, $agent) )
    {
        $GLOBALS['isBotRobot'] = true;
    }    
}
?>