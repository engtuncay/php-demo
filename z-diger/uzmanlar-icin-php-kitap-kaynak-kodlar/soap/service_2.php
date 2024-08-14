<?php
ini_set("soap.wsdl_cache_enabled", "0");
/**
 * müşteri bilgileri
 *
 * @author msamli
*/
class Musteri{
	/**
	 * müşteri bilgilerini get eder
	 *
	 * @param id $id
	 * @return stdClass
	 */
	public function musteriBilgisiGetir($id){
		$OBJECT = new stdClass();
		$OBJECT->id = $id;
		$OBJECT->ad=’Mehmet’;
		$OBJECT->soyad=’Şamlı’;
		$OBJECT->telefon=’325588’;
		$OBJECT->adres=’aloo’;
		$OBJECT->bakiye = 225.87;
		$OBJECT->dogumtarih=’2012-10-11’;
		return $OBJECT;
	}
}

if(isset($_GET['wsdl'])){
	$soap = new SoapServer('BankaServis.wsdl');
	$soap->setClass('Musteri');
	$soap->handle();
}else{
	echo 'döküman';
}