<?php
namespace model;
/**
* class’ların contruct methodunda parametre almıyorsa class’lara singleton
* oluşturur
*
* @author Mehmet Şamlı <mehmetsamli@gmail.com>
*/
trait Singleton {

	/**
	 * class içeriğini tutan obje
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * class'ın singleton methodu
	 *
	 * @return Validate
	 */
	public static function &getInstance() {
		if (! (self::$instance instanceof self))
			self::$instance = new self();
		return self::$instance;
	}
}