<?php

class Fruit
{
  public string $name;

  public float $id;
}

$apple = new Fruit();
var_dump($apple instanceof Fruit);
