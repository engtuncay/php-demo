<?php
/**
 * xCache class
 *
 * @author Cristian Rodriguez <judas.iscariote@flyspray.org>
 */
class XCache 
{
    /**
     * cache zamanaşımı süresi
     *
     * @var integer
     */
    public $timeout=10;
    /**
     * singleton objesi
     *
     * @var object
     */
    private static $xcobj;
    /**
     * construct metodu kullanılamaz
     *
     */
    private function __construct()
    {
    }
    /**
     * class clone komutu kullanılarak clonlanamaz
     *
     */
    public final function __clone()
    {
        throw new BadMethodCallException("Clone is not allowed");
    }    
    /**
     * getInstance 
     * 
     * @static
     * @access public
     * @return object XCache instance
     */
    public static function getInstance() 
    {
        if (!(self::$xcobj instanceof XCache)) {
            self::$xcobj = new XCache;
        }
        return self::$xcobj; 
    }
    /**
     * __set 
     * 
     * @param mixed $name 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function __set($name, $value)
    {
        xcache_set($name, $value,$this->timeout);
    }
    /**
     * __get 
     * 
     * @param mixed $name 
     * @access public
     * @return void
     */
    public function __get($name)
    {
        return xcache_get($name);
    }
    /**
     * __isset 
     * 
     * @param mixed $name 
     * @access public
     * @return bool
     */
    public function __isset($name)
    {
        return xcache_isset($name);
    }
    /**
     * __unset 
     * 
     * @param mixed $name 
     * @access public
     * @return void
     */
    public function __unset($name)
    {
        xcache_unset($name);
    }
}
?>