<?php
class Fruit {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

$fruit1 = new Fruit();

$fruit1->set_name("çilek");

echo $fruit1->get_name() . "<br>";


?>

