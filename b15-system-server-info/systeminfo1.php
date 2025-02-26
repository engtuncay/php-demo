<?php

//var_dump($_SERVER);
//print_r($_SERVER);
//echo "\n";
//echo '<br><br>';

echo $_SERVER['PHP_HOME'];
echo PHP_EOL;
echo "<br//>";

if (array_key_exists("SERVER_NAME", $_SERVER)) {
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        echo 'localhost bağlantı';
    } else {
        echo 'localhost bağlantısı değil';
    }
}
