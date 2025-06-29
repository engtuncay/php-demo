<?php

$a1 = [1658,2356,587];

$a2 = [1578,2356];

//$a3 = [...$a1, ...$a2]; // Merge arrays using spread operator

$a4 = array_merge($a1, $a2); // Merge arrays using array_merge function

$unique = array_unique($a4); 

print_r($unique); // Print the values of the array

// sort($unique); // Sort the array in ascending order
//array_multisort($unique, SORT_ASC); // Sort the array in ascending order

sort($unique, SORT_NUMERIC); // Sort the array in ascending order numerically

print_r($unique); // Print the values of the array






