<?php
namespace model;

use model\form\Form;

/**
 * Tüm header'da oluşturulan işlemlerin toplandığı class'dır
 *
 * @author Mehmet Şamlı
 */
final class Header {

	/**
	 * sayfanın karakter setini set eder
	 *
	 * @param string $contentType
	 * @param string $encoding
	 */
	public static function setContentType($contentType) {
		header ( "Content-Type:{$contentType};charset=" . Config::CHARACTER_SET );
		header ( "X-Powered-By: Turkiye" );
		header ( "Server: Turkiye Web Server" );
	}

	/**
	 * sayfa redirect yapar
	 *
	 * @param string $url
	 */
	public static function redirect($url) {
		if (! headers_sent ())
			header ( "Location: {$url}" );
		sprintf ( "<script type=\"text/javascript\">window.location.href='%s'</script>", Form::setInput ( $url ) );
		exit ( 0 );
	}

	/**
	 * client'ın ip adresini get eder
	 *
	 * @return string
	 */
	public static function getIpAddress() {
		if (getenv ( "HTTP_X_FORWARDED_FOR" ) != '')
			return getenv ( "HTTP_X_FORWARDED_FOR" );
		return getenv ( "REMOTE_ADDR" );
	}
}
