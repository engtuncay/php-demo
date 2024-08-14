<?php
/**
 * ip lokasyon işlemlerini yürüten class
 *
 * @author Mehmet Şamlı
 */
class geoip
{
    /**
     * ip adresini get eder
     *
     * @return string
     */
    private function getIpAddress() 
    {
        if (getenv("HTTP_X_FORWARDED_FOR") != '')
            return getenv("HTTP_X_FORWARDED_FOR"); 
        else
            return getenv("REMOTE_ADDR");
    }
    /**
     * koda göre komut get eder
     *
     * @param integer $code
     * @return string
     */
    private static function getComut($code)
    {
        $comut = '';
        switch ($code)
        {
            case 1:
                $comut = 'geoip_country_code_by_name';
                break;
            case 2:
                $comut = 'geoip_country_code3_by_name';
                break;
            case 3:
                $comut = 'geoip_country_name_by_name';
                break;
        }
        return $comut;
    }
    /**
     * ip adresinin hangi ülkeye ait olduğunu get eder
     *
     * @param string $ipAddress
     * @param integer $code
     * @return string
     */
    public static function getCountyCode($ipAddress=null,$code=1)
    {
        $comut = self::getComut($code);
        
        if(is_null($ipAddress))
            return $comut(self::getIpAddress());
        else 
            return $comut($ipAddress);
    }
    /**
     * tüm lokasyon bilgilerini array olarak get eder 
     *
     * @param string $ipAddress
     * @return Array
     */
    public static function getLocationArray($ipAddress=null)
    {
        if(is_null($ipAddress))
            return geoip_record_by_name(self::getIpAddress());
        else 
            return geoip_record_by_name($ipAddress);
    }
    /**
     * ülke koduna göre zaman dilimini get eder
     *
     * @param string $code
     * @return string
     */
    public static function getCodeTimeZone($code)
    {
        return geoip_time_zone_by_country_and_region($code);
    }
}
?>