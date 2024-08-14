<?php 
/** 
 * smarty için expires zamanı verir 
 * array('minute'=>1)
 * array('hour'=>2)
 * array('day'=>30)
 * array('month'=>1)
 * array('year'=>1) 
 *
 * @param Array $timeArr  
 * @return integer 
 */ 
function getExpires($setTimeArr = array()) 
{ 
    /** 
     * 60 = 1dk 
     * 3600 = 1 saat 
     * 86400 = 1 gün 
     * 259200 = 1 ay 
     * 31557600 = 1 yıl "365 gün + 6 saat" 
     */ 
    $timeArr = array( 
                        'year'=>31557600, 
                        'month'=>2592000, 
                        'day'=>86400, 
                        'hour'=>3600, 
                        'minute'=>60 
                    ); 
    foreach ($timeArr as $name=>$value) 
    { 
        if(array_key_exists($name,$setTimeArr)) 
        { 
            $timeText = $setTimeArr[$name]*$value; 
            break; 
        } 
    } 
    return $timeText; 
} 
?>
