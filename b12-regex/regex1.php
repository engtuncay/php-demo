<?php
$txTemplate = "Merhaba {{name}}, bugün {{day}}.";
$txKey = "name";

$regex = "/\{\{$txKey\}\}/";
echo "Regex Pattern: $regex\n";
echo preg_match($regex, $txTemplate) . "\n";

echo preg_match($regex, $txTemplate)===1 ? "Eşleşme var\n" : "Eşleşme yok\n";

