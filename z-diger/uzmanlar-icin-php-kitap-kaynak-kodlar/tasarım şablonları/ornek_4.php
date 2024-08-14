<?php
/**
 * abstrcut class
 */
abstract class NameDecorate {
  abstract public function __construct(Name $name);
  public function resetLastName() {
    $this->lastName = $this->name->getLastName();
  }
  public function showLastName() {
    return $this->lastName;
  }
}
/**
 * var olan ana class
 */
class Name {
  private $firstName;
  private $lastName;
  public function __construct($lastName_in, $firstName_in) {
    $this->firstName = $firstName_in;
    $this->lastName  = $lastName_in;
  }
  public function getFirstName() {
    return $this->firstName;
  }
  public function getLastName() {
    return $this->lastName;
  }
  public function getFirstNameAndLastName() {
    return $this->getLastName().' '.$this->getFirstName();
  }
}
/**
 * decorate pattern class
 */
class NameDecorator extends NameDecorate {
  protected $name;
  public $lastName;
  public function __construct(Name $name_in) {
    $this->name = $name_in;
    $this->resetLastName();
  }
}
$patternName = new Name("Mehmet","Şamlı");
$decorator = new NameDecorator($patternName);
echo $decorator->showLastName();
?>