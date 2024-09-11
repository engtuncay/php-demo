<?php
function myTest()
{
  static $x = 0; // static member/field !!!
  echo $x;
  $x++;
}

myTest();
myTest();
myTest();
?>