<?php
class ArrayToXML {
	/**
	 * array bilgisini xml'e çevirir
	 *
	 * @param array $data
	 * @param string $rootNodeName
	 * @param type $xml
	 * @return xml
	 */
	public static function toXml(Array $data, $rootNodeName ='data', $xml = null) {
		if ($xml == null) {
			$xml = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$rootNodeName />");
		}
		foreach ($data as $key => $value) {
			if (is_numeric($key)) {
				$key = "bilinmeyenNode_" . (string) $key;
			}
			$key = preg_replace('/[^a-z]/i', '', $key);
			if (is_array($value)) {
				$node = $xml->addChild($key);
				self::toXml($value, $rootNodeName, $node);
			} else {
				$xml->addChild($key, $value);
			}
		}
		return $xml->asXML();
	}
}