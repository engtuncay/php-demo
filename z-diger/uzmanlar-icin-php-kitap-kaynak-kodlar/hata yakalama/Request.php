<?php
namespace model;

/**
 * Tüm request işlemlerini yürüten static class
 *
 * @author Mehmet Şamlı <mehmetsamli@gmail.com>
 */
final class Request {

	/**
	 * tanımlı olmayan bir değişken çağrıldığında dönecek değer
	 *
	 * @var null
	 */
	const DEFAULT_EMPTY_DATE = null;

	/**
	 * request tırnak temizleyen method
	 *
	 * @param string $value
	 * @return string
	 */
	private static function setData($value,$clearXSS) {
		if (is_array ( $value ))
			return self::addslashes_array ( $value , $clearXSS);
		else
			return self::clean ( $value,$clearXSS );
	}

	/**
	 * XSS için her türlü html karakteri encode et
	 *
	 * @param string $value
	 * @return string
	 */
	public static function clean($value,$clearXSS) {
		if($clearXSS){
			$value = htmlspecialchars_decode(trim($value),ENT_QUOTES);
			return trim(htmlspecialchars($value, ENT_QUOTES, Config::CHARACTER_SET ));
		}
		else
			return trim($value);
	}
	/**
	 * array olan değişkenlerde yer alan tırnakları addslashes yapar
	 *
	 * @param array $input_arr
	 * @param boolean $clearXSS
	 * @return type
	 */
	public static function addslashes_array($input_arr,$clearXSS=true) {
		if (is_array ( $input_arr ) || is_object ( $input_arr )) {
			$tmp = array ();
			foreach ( $input_arr as $key1 => $val ) {
				$tmp [$key1] = self::addslashes_array ( $val,$clearXSS );
			}
			return $tmp;
		} else {
			return self::clean ( $input_arr,$clearXSS );
		}
	}

	/**
	 * $_GET Method
	 *
	 * @param string $requestName
	 * @param boolean $clearXSS
	 * @return string
	 */
	public static function _get($requestName,$clearXSS=true) {
		return isset($_GET[$requestName]) ? self::setData ( $_GET [$requestName],$clearXSS ) : self::DEFAULT_EMPTY_DATE;
	}

	/**
	 * $_POST Method
	 *
	 * @param string $requestName
	 * @param boolean $clearXSS
	 * @return string
	 */
	public static function _post($requestName,$clearXSS=true) {
		return isset ($_POST[$requestName] ) ? self::setData ( $_POST [$requestName],$clearXSS ) : self::DEFAULT_EMPTY_DATE;
	}

	/**
	 * $_REQUEST Method
	 *
	 * @param string $requestName
	 * @param boolean $clearXSS
	 * @return string
	 */
	public static function _request($requestName,$clearXSS=true) {
		return isset ( $_REQUEST[$requestName] ) ? self::setData ( $_REQUEST [$requestName],$clearXSS ) : self::DEFAULT_EMPTY_DATE;
	}

	/**
	 * $_SESSION Method
	 *
	 * @param string $requestName
	 * @param boolean $clearXSS
	 * @return string
	 */
	public static function _session($requestName,$clearXSS=true) {
		return  isset( $_SESSION[$requestName] ) ? self::setData ( $_SESSION [$requestName],$clearXSS ) : self::DEFAULT_EMPTY_DATE;
	}

	/**
	 * $_COOKIE Method
	 *
	 * @param string $requestName
	 * @return string
	 */
	public static function _cookie($requestName,$clearXSS=true) {
		return isset($_COOKIE[$requestName] ) ? self::setData ( $_COOKIE [$requestName],$clearXSS ) : self::DEFAULT_EMPTY_DATE;
	}

	/**
	 * $_FILES methodu
	 *
	 * @param string $requestName
	 * @return Array
	 */
	public static function _file($requestName) {
		return $_FILES [$requestName];
	}
}