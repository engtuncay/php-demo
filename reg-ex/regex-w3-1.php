<?php

$str = "Visit W3Schools";
$pattern = "/w3schools/i"; // i -> case-insensitive
echo preg_match($pattern, $str);

echo "\n";

$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str);

echo "\n";

$str = "Visit Microsoft!";
$pattern = "/microsoft/i";
echo preg_replace($pattern, "W3Schools", $str);
