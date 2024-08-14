<?php
namespace model;
/**
* Tüm config bilgilerinin tutulduğu class
*
* @author msamli
*/
final class Config {
	/**
	 * ana root
	 *
	 * @var string
	 */
	const ROOT = '/home/aspet.net/';
	/**
	 * php dosyalarının yer aldığı root
	 *
	 * @return string
	 */
	const ROOT_PATH = '/home/aspet.net/html';
	/**
	 * memcache host array
	 *
	 * @var array
	 */
	public static $CACHE_HOST = array(
			[
			'host' => '127.0.0.1',
			'port' => 11211,
			'oran' => 100
			]
	);
}