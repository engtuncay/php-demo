<?php
/*
    print_r()
    var_dump()
    explode()
    implode()
    count()
    is_array()
    shuffle()
    array_combine()
    array_count_values()
    array_flip()
    array_key_exists()
*/

// Array Tanımlama


// ## Associative Array
$arr = [ 'ad' => 'tayfun', 'soyad' => 'erbilen', 'yas' => 24 ];

print_r($arr);

/* Output
 Array ( [ad] => tayfun [soyad] => erbilen [yas] => 24 )
 */

echo "<br/>";

var_dump($arr);

/* Output
 * array(3) { ["ad"]=> string(6) "tayfun" ["soyad"]=> string(7) "erbilen" ["yas"]=> int(24) }
 */

echo "<br/>";

// ## explode ile string parçalayıp array yaparız.

$test = 'tayfun,erbilen,udemy';
$arr = explode(',', $test);

print_r($arr);

/**
 * Array ( [0] => tayfun [1] => erbilen [2] => udemy )
 */

echo "<br/>";

// ## implode ile array birleştirip string haline getiririz.
$string = implode('|', $arr);

echo $string;

/**
 * tayfun|erbilen|udemy
 */

echo "<br/>";

echo count($arr);

/**
 * 3
 */

echo "<br/>";

if (is_array($arr)){
    echo '$arr bir dizidir';
} else {
    echo '$arr dizi değildir!';
}

echo "<br/>";

// ## shuffle diziyi karıştırmak için kullanılır
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($arr);

print_r($arr);

/**
 * Array ( [0] => 7 [1] => 10 [2] => 6 [3] => 2 [4] => 3 [5] => 5 [6] => 1 [7] => 9 [8] => 8 [9] => 4 )
 */

echo "<br/>";

// ## array_combine key dizisi, value dizisi verilerek, sırayla alarak associative array yapar
$keys = ['ad', 'soyad'];
$values = ['tayfun', 'erbilen'];

$arr = array_combine($keys, $values);

print_r($arr);

/**
 * Array ( [ad] => tayfun [soyad] => erbilen )
 */

echo "<br/>";

$arr = ['tayfun', 'erbilen', 'udemy', 'tayfun', 'udemy'];
$arr2 = array_count_values($arr);

print_r($arr2);

/*
Array
(
    [tayfun] => 2
    [erbilen] => 1
    [udemy] => 2
)
*/

$arr = [
    'ad' => 'tayfun',
    'soyad' => 'erbilen',
    'yas' => 24
];
$arr2 = array_flip($arr);

print_r($arr2);

/*
Array
(
    [tayfun] => ad
    [erbilen] => soyad
    [24] => yas
)
*/

$arr = [
    'ad' => 'tayfun',
    'a' => [
        'b' => [
            'c' => [
                'd' => 'e',
                'e' => 'f'
            ]
        ]
    ]
];


if (array_key_exists('ad', $arr)) {
    echo 'ad anahtarı var!';
} else {
    echo 'ad anahtarı yok!';
}


function _array_key_exists($cur_key, $arr)
{
    foreach ($arr as $key => $val) {
        if ($key == $cur_key) {
            return true;
        }
        if (is_array($val)) {
            return _array_key_exists($cur_key, $val);
        }
    }
    return false;
}

/*
ad anahtarı var!
*/

if (_array_key_exists('e', $arr)) {
    echo 'c anahtarı var!';
} else {
    echo 'c anahtarı yok!';
}

/*
c anahtarı var!
*/

// array oluşturma
print_r(array(1, 5));
