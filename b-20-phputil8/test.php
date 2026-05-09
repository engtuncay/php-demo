<?php
use Engtuncay\Phputils8\FiDtos\Fkb;

require __DIR__ . '/vendor/autoload.php';

$fkb = new Fkb();

$fkb->put("name", "Tuncay");

echo print_r($fkb->getArr(), true);

