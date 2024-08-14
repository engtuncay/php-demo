<?php
/**
 * singleton class örneği
 */
class deneme
{
  /**
   * class objesini tutan sabit değişken
   *
   * @var object
   */
  private static $instance;
  /**
   * construct metodu
   * @return void
   */
  private function __construct() 
  {
  }
  /**
   * singleton metod
   *
   * @return object
   */
  public static function singleton() 
  {
    if (!isset(self::$instance)) {
      $c = __CLASS__;
      self::$instance = new $c;
    }
    return self::$instance;
  }
  /**
   * veri get edern method
   *
   * @return string
   */
  public function getData()
  {
    return 'Merhaba Taha';
  }
}
$deneme =& deneme::singleton();
echo $deneme->getData();
?>