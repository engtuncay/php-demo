<?php
require_once __DIR__ . "/../vendor/autoload.php";

$colName = new \Engtuncay\Phputils\meta\FiCol("id");

echo "Field:" . $colName->ofcTxFieldName;
