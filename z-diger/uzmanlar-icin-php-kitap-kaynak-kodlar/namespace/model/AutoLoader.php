<?php
namespace model;
/**
 * class'ların otomatik yüklenmesini sağlayan class
 *
 * @author Mehmet Şamlı
 */
final class AutoLoader {
	/**
	 * ana class'ların otomatik yüklenmesini sağlar
	 *
	 * @param string $className
	 * @return void
	 */
	final public static function mainClassLoader($className) {
		$file = sprintf('%s/%s.php', Config::ROOT_PATH,	str_replace('\\', '/', $className));
		if (file_exists($file))
			require_once $file;
	}
}


/*
spl_autoload_register(function($classname) {
	model\AutoLoader::mainClassLoader($className);
});
*/