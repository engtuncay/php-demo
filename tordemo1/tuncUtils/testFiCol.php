<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Engtuncay\Phputils\core\FiString;
use Engtuncay\Phputils\meta\FiCol;

$colName = new FiCol("id");
//$colName->ofcTxFieldName = "deneme";
echo "Field:" . $colName->ofcTxFieldName;
echo "<br/>";
echo "Header:" . $colName->ofcTxHeader;
echo "<br/>";
//echo "Label:" . FiString::orEmpty($colName->txLabel);

// objelerde alanlara array gibi ulaşamayız.
// $colName['ofcTxFieldName'] = "idx";