<?php
/**
 * isim namespace'i
 */
namespace isim {
	/**
	 * isimler
	 *
	 * @author Mehmet Şamlı<mehmetsamli@gmail.com>
	 */
	class Isimler {
		/**
		 * parametreler
		 * @var array
		 */
		private $criteria = array();
		/**
		 * parametre set eder
		 *
		 * @param string $key
		 * @param string $value
		*/
		public function __set($key, $value) {
			$this->criteria[$key] = $value;
		}
		/**
		 * parametre get eder
		 *
		 *++PHP-BOLUM13.indd 331 27.02.2013 14:37
		 *332 PHP
		 * @param string $key
		 * @return string
		 */
		public function __get($key) {
			return $this->criteria[$key];
		}
		/**
		 * değer var olup olmadığını kontrol eder
		 * @param string $key
		 * @return boolean
		 */
		public function __isset($key) {
			return array_key_exists($key, $this->criteria);
		}
	}
}
/**
 * sehir namespace
 */
namespace sehir{
	/**
	 * isimler class
	 * @author Mehmet Şamlı
	 */
	class Isimler{
		/**
		 * şehir listesi
		 * @var array
		 */
		private $sehirlerArr = array();
		/**
		 * şehir bilgisi set eder
		 *
		 * @param int $key
		 * @param string $sehir
		*/
		public function setSehir($key,$sehir){
			$this->sehirlerArr[$key] = $sehir;
		}
		/**
		 * şehir get eder
		* @param integer $key
		* @return string
		*/
		public function getSehir($key){
			return $this->sehirlerArr[$key];
		}
		/**
		 * şehir olup olmadığını kontrol eder
		 * @param integer $key
		 * @return boolean
		 */
		public function issetSehir($key){
			return array_key_exists($key, $this->sehirlerArr);
		}
	}
}
/**
 * global namespace
 */
namespace{
	# isim namespace içerisindeki Isimler class'ını
	# isimClass olarak değiştiriyoruz.
	use isim\Isimler As isimClass;
	# sehir namespace içerisindeki Isimler class'ının
	# adını sehirClass olarak değişitiroyruz.
	use sehir\Isimler as sehirClass;
	#############################
	$ISIMCLASS = new isimClass();
	$ISIMCLASS->isim_1 = 'Mehmet';
	$ISIMCLASS->isim_2 = 'Taha';
	$ISIMCLASS->isim_3 = 'Kerem';
	if (isset($ISIMCLASS->isim_4)){
		echo $ISIMCLASS->isim_4.' adında bir key var. <br />';
	}else{
		echo 'Böyle bir key yok. <br />';
	}
	################################

	################################
	$SEHIRCLASS = new sehirClass();
	$SEHIRCLASS->setSehir(1, 'Adana');
	$SEHIRCLASS->setSehir(53,'Rize');
	if($SEHIRCLASS->issetSehir(53)){
		echo $SEHIRCLASS->getSehir(53);
	}
	else{
		echo '53 nolu şehir yok';
	}
	#################################
}