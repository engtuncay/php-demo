<?php
/**
 * memcache ile sorgu cacheleme yapıyoruz.
 * kitap içerisinde verilen örnekten biraz farklılaştırdım.
 * 
 * @author Mehmet Şamlı
 */
class cache
{
	/**
	 * static memcache objesi
	 *
	 * @var object
	 */
	private static $MEMCACHE;
	/**
	 * static connection
	 *
	 */
	public static function &connection()
	{
		if(!is_object(self::$MEMCACHE))
		{
			self::$MEMCACHE =& Loader::loadClass('Memcache');
			self::$MEMCACHE->connect("localhost", 11211) or die("Memcache:> Bağlantı kurulamadı...");
		}
	}
	/**
	 * get cache object
	 *
	 * @param string $cache_id
	 * @return object
	 */
	public static function &getCache($cache_id)
	{
		self::connection();		
		return self::$MEMCACHE->get($cache_id);				
	}
	/**
	 * set cache
	 *
	 * @param string $cache_id
	 * @param object $result
	 * @param integer $timeout
	 * @return void
	 */
	public static function setCache($cache_id,$result,$timeout)
	{
		self::connection();
		self::$MEMCACHE->set($cache_id, $result, false, $timeout);
	}
	/**
	 * flush all cache
	 *
	 * @return void
	 */
	public function flushCache()
	{
		self::connection();
		self::$MEMCACHE->flush();
	}
	/**
	 * delete cache
	 *
	 * @param string $cache_index
	 * @return void
	 */
	public static function deleteCache($cache_index){
		self::connection();
		self::$MEMCACHE->delete($cache_index,1);
	}
}
?>