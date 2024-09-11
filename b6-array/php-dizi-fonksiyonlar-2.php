<?php

/*
    array_map()
    array_filter()
    array_merge()
    array_rand()
    array_reverse()
    array_search()
    in_array()
    array_shift()
    array_pop()
    array_slice()
    array_sum()
    array_product()
    array_unique()
*/

function filtrele($val){
    return $val . ' -';
}

/*
Array
(
    [0] => 1 -
    [1] => 2 -
    [2] => 3 -
    [3] => 4 -
    [4] => 5 -
)
*/

$arr = [1,2,3,4,5];
$arr2 = array_map('filtrele', $arr);
$arr2 = array_map(function($val){
    return $val . ' -';
}, $arr);

print_r($arr2);

$arr = [1,2,3,4,5];
$arr2 = array_filter($arr, function($item){
    return $item > 2 && $item < 5;
});
$arr2 = array_map(function($val){
    if ($val > 2 && $val < 5){
        return $val;
    }
}, $arr);

print_r($arr2);

$arr1 = [1,2,3];
$arr2 = [4,5,6];

$arr = array_merge($arr1, $arr2);

print_r($arr);

$arr = [
    'ad' => 'tayfun',
    'soyad' => 'erbilen',
    'yas' => 24,
    'site' => 'erbilen.net'
];

$random = array_rand($arr, 2);
$values = array_map(function($key) use($arr){
    return $arr[$key];
}, $random);

print_r($values);

$arr = [1,2,3,4,5];

print_r($arr);

$arr = array_reverse($arr);

print_r($arr);

$arr = [
    'ad' => 'tayfun',
    'soyad' => 'erbilen',
    'a' => [
        'b' => [
            'c' => 'd'
        ]
    ]
];

$test = array_search('d', $arr);

function _array_search($cur_val, $arr)
{
    foreach ($arr as $key => $val){
        if ($val == $cur_val){
            return true;
        }
        if (is_array($val)){
            return _array_search($cur_val, $val);
        }
    }
    return false;
}

$test = _array_search('d', $arr);

echo $test . "\n";

$arr = [1,2,3,4];

if (in_array('6', $arr))
{
    echo '6 değeri var' . "\n";
} else {
    echo 'yok' . "\n";
}


$arr = [1,2,3,4,5];
$ilk_eleman = array_shift($arr);
echo $ilk_eleman."\n";
$son_eleman = array_pop($arr);
echo $son_eleman . "\n";
print_r($arr);


$arr = [1,2,3,4,5];

// ilk 2 eleman hariç hepsi
$arr2 = array_slice($arr, 2);
print_r($arr2);

$arr3 = array_slice($arr, 2, 2);
print_r($arr3);

$arr4 = array_slice($arr, -2);
print_r($arr4);

$arr = [1,2,3,4,5];
$toplam = array_sum($arr);
echo $toplam;

$carpim = array_product($arr);
echo $carpim;

$arr = ['tayfun','erbilen','tayfun','erbilen','udemy'];
print_r($arr);
$arr2 = array_unique($arr);
print_r($arr2);
/*

Array
(
    [0] =>
    [1] =>
    [2] => 3
    [3] => 4
    [4] =>
)
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
)
Array
(
    [0] => 24
    [1] => erbilen.net
)
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
)
Array
(
    [0] => 5
    [1] => 4
    [2] => 3
    [3] => 2
    [4] => 1
)

1
yok
1
5

Array
(
    [0] => 2
    [1] => 3
    [2] => 4
)
Array
(
    [0] => 3
    [1] => 4
    [2] => 5
)

Array
(
    [0] => 3
    [1] => 4
)

Array
(
    [0] => 4
    [1] => 5
)

15120

Array
(
    [0] => tayfun
    [1] => erbilen
    [2] => tayfun
    [3] => erbilen
    [4] => udemy
)
Array
(
    [0] => tayfun
    [1] => erbilen
    [4] => udemy
)

*/

