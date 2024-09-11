<?php

/*
    Veri Türleri (Data Types)
        string "tayfun erbilen" 'tayfun erbilen'
        integer 500, 200
        double (Float) 5.5, 7.2
        boolean (true, false)
        array (dizi)
        object (Nesne)
        NULL
    gettype()
*/

$string = "tayfun erbilen";
$int = 500;
$float = 5.5;
$bool = false;
$array = array();
$object = new stdClass;
$null = NULL;
echo gettype($null);
echo "<br>";
echo gettype($array);

/* Output
NULL
array
*/

?>