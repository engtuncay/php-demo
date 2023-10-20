<?php

/*
    func_num_args()
    func_get_args()
    func_get_arg()
*/

function test()
{
  echo func_num_args() . '<br>';
  print_r(func_get_args()) . '<br>';
  echo func_get_arg(2);
}

test('tayfun', 'udemy', 'prototurk', '93academy');

// **Output**
/* 
4
Array
(
    [0] => tayfun
    [1] => udemy
    [2] => prototurk
    [3] => 93academy
)
prototurk
*/

?>