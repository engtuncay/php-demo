<?php
class MyArray extends ArrayObject {
  function __construct($array = array()){ 
    parent::__construct($array, ArrayObject::ARRAY_AS_PROPS);
  }

  public function get_property_string($sep = ':') {
    return implode($sep, $this->getArrayCopy());
  }

  public function __ToString() {
    return 'Array';
  }

}

$a = new MyArray;
// $a->append('LOGIN');
// $a->append('BETA_ACCESS');
// $a->append('COMMENT_WRITE');
$a['firstName'] = "Ali";
$a['surName'] = "Alia";

var_dump($a->get_property_string());
echo json_encode($a);
echo "\n";
echo gettype($a);

$arr = array("abc" => "Welcome", "aaa" => "to");
echo "\n";
echo gettype($arr);


/*
 * Output:
 *   string(31) "LOGIN:BETA_ACCESS:COMMENT_WRITE"
 */