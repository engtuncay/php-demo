<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Engtuncay\Phputils8\FiCols\AbsFkbTable;
use Phpworkshop\FkcEspMusteri;

//var_dump(class_exists('Engtuncay\\Phputils8\\FiCols\\AbsFkbTable'));

$fkc = new FkcEspMusteri();

function testAbsClass(AbsFkbTable $absClass)
{
  echo "Table Name:" . $absClass::sqTableName()->getFcTxHd(); 
}

testAbsClass($fkc);
echo PHP_EOL;

// objelerde alanlara array gibi ulaşamayız.
// $colName['ofcTxFieldName'] = "idx";