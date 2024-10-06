<?php
// preg_match() example : pattern olup olmadığını döner - varsa 1, yoksa 0 döner
$str = "Visit W3Schools";
$pattern = "/w3schools/i"; // i -> case-insensitive
echo preg_match($pattern, $str);

echo "\n";

if (preg_match($pattern, $str)) {
  echo "pattern mevcut";
}

echo "\n";

//////////////////////////////////////////////
////////////////////////////////////////////// 


// preg_match_all example : pattern'in sayısını verir

$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str);

echo "\n";
echo "\n";

//////////////////////////////////////////////  

// preg_match ile eşleşen parçaları bulma

preg_match_all($pattern, $str, $matches, PREG_SET_ORDER);

foreach ($matches as $m) {
  echo $m[0];
  echo "\n";
}

echo "\n";
echo "Gruplu bulma\n\n";

$str2 = "The rain in SPAIN falls mainly on the plains.";
$pattern2 = "/f(all).*(ain)/i";

preg_match_all($pattern2, $str2, $matches2, PREG_SET_ORDER);

foreach ($matches2 as $m) {
  echo "m0:" . $m[0];
  echo "\n";
  if (!empty($m[1])) {
    echo "m1:" . $m[1];
    echo "\n";
  }
}

echo "\n";

//////////////////////////////////////////////  

$str = "Visit Microsoft!";
$pattern = "/microsoft/i";

echo preg_replace($pattern, "W3Schools", $str);


//////////////////////////////////////////////

