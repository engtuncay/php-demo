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

// Associative Array

$arr = [
    'ad' => 'tayfun',
    'soyad' => 'erbilen',
    'yas' => 24
];

print_r($arr);

/* ** Output
 Array
(
    [ad] => tayfun
    [soyad] => erbilen
    [yas] => 24
)
 */

var_dump($arr);

/* ** Output
array(3) {
  ["ad"]=>
  string(6) "tayfun"
  ["soyad"]=>
  string(7) "erbilen"
  ["yas"]=>
  int(24)
}
*/

$test = 'tayfun,erbilen,udemy';
$arr = explode(',', $test);

print_r($arr);

/*
Array
(
    [0] => tayfun
    [1] => erbilen
    [2] => udemy
)
*/

$string = implode('|', $arr);

echo $string;
echo "\n";
echo count($arr);
echo "\n";

/*
tayfun|erbilen|udemy
3
*/

/*
if (is_array($arr)){
    echo 'bu bir dizidir';
} else {
    echo 'bu bir dizi değildir!';
}
*/

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($arr);

print_r($arr);

/*
Array
(
    [0] => 5
    [1] => 4
    [2] => 1
    [3] => 10
    [4] => 9
    [5] => 6
    [6] => 3
    [7] => 8
    [8] => 2
    [9] => 7
)
*/

$keys = ['ad', 'soyad'];
$values = ['tayfun', 'erbilen'];

$arr = array_combine($keys, $values);

/*
Array
(
    [ad] => tayfun
    [soyad] => erbilen
)
*/

print_r($arr);

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


if (array_key_exists('ad', $arr)){
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
print_r(array(1,5));
