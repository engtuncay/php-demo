<?php
// Array Examples (2)

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
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24
];

print_r($arr);

// --Output--
// Array ( [ad] => ali [soyad] => veli [yas] => 24 )

echo "<br/><br/>var_dump(\$arr)<br/>";

var_dump($arr);

/* --Output--
array(3) {
["ad"]=>
string(6) "ali"
["soyad"]=>
string(7) "veli"
["yas"]=>
int(24)
}
*/

echo "<br/><br/>Assoc Array'e element ekleme<br/>";

$arr += ['cinsiyet' => 'erken'];
print_r($arr);

// Alernative Way
// $data += array($category => $question);


// Alt.Way (array_push ile assoc eleman ekleme)
// array_push($data, array($category => $question));
// Normal eleman ekleme (indeksli array için)
// array_push($data,$question);

//echo "<br/><br/> <br/>";

echo "<br/><br/>Explode Örnek<br/>";

$test = 'ali,veli,udemy';
$arr = explode(',', $test);

print_r($arr);

// Array ( [0] => ali [1] => veli [2] => udemy )

$string = implode('|', $arr);

echo $string ."<br/>";
echo count($arr) . "<br/>";

// --Output--
/*
ali|veli|udemy
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
$values = ['ali', 'veli'];

$arr = array_combine($keys, $values);
print_r($arr);

/*
Array
(
[ad] => ali
[soyad] => veli
)
*/

$arr = ['ali', 'veli', 'udemy', 'ali', 'udemy'];
$arr2 = array_count_values($arr);

print_r($arr2);

/*
Array
(
[ali] => 2
[veli] => 1
[udemy] => 2
)
*/

$arr = [
    'ad' => 'ali',
    'soyad' => 'veli',
    'yas' => 24
];
$arr2 = array_flip($arr);

print_r($arr2);

/*
Array
(
[ali] => ad
[veli] => soyad
[24] => yas
)
*/

$arr = [
    'ad' => 'ali',
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




// incele assoc array ekleme

// $data = array();
//foreach($file_data as $value) {
//    list($category, $question) = explode('|', $value, 2);
//
//    if(!isset($data[$category])) {
//        $data[$category] = array();
//    }
//    $data[$category][] = $question;
//}
//print_r($data);