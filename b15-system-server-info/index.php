<?php

//var_dump($_SERVER);
print_r($_SERVER);

echo '<br><br>';

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  echo 'localhost bağlantı';
} else {
  echo 'localhost bağlantı değil';
}


?>