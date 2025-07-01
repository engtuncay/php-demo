<?php

$key1 = 'ad';
$key2 = 'key2';

$arr = [
    $key1 => 'tayfun',
    'soyad' => 'erbilen',
    'yas' => 24,
    'site' => 'erbilen.net'
];

$arr[$key2] = 'yeni_key';

print_r($arr);
