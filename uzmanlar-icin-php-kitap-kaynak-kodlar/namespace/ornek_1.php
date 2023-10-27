<?php
/**
 * isim adlı namespace
 */
namespace isim{
	/**
	 * isim bilgilerini get eder
	 * @return array
	 */
	function getData(){
		return ['Taha','Kerem'];
	}
}
/**
 * sehir adlı namespace
 */
namespace sehir{
	/**
	 * şehir listesini get eder
	 * @return array
	 */
	function getData(){
		return ['Ankara','İstanbul'];
	}
}
/**
 * global namespace
 */
namespace{
	function getDebug(Array $arr){
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}
	$isimArr = isim\getData();
	$sehirArr = sehir\getData();
	getDebug($isimArr);
	getDebug($sehirArr);
}
?>