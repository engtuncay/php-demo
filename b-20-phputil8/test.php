<?php
use Engtuncay\Phputils8\FiDto\FiKeybean;

require __DIR__ . '/vendor/autoload.php';

$fkb = new FiKeybean();

$fkb->put("name", "Tuncay");

echo print_r($fkb->getArr(), true);

