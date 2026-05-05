<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Engtuncay\Phputils8\FiCols\AbsFkbTable;
use Engtuncay\Phputils\core\FiString;
use Engtuncay\Phputils\meta\FiCol;
use Phpworkshop\FkcEspMusteri;

//var_dump(class_exists('Engtuncay\\Phputils8\\FiCols\\AbsFkbTable'));

$fkc = new FkcEspMusteri();

function testAbsClass(AbsFkbTable $absClass)
{
  echo "Table Name:" . $absClass::sqTableName()->getFcTxHd(); 
}

testAbsClass($fkc);
echo PHP_EOL;

$colName = new FiCol("id");
//$colName->fcTxFieldName = "deneme";
echo "Field:" . $colName->fcTxFieldName;
echo PHP_EOL;
echo "Header:" . $colName->fcTxHeader;
echo PHP_EOL;
//echo "Label:" . FiString::orEmpty($colName->txLabel);

// objelerde alanlara array gibi ulaşamayız.
// $colName['fcTxFieldName'] = "idx";