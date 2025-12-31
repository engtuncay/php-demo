<?php

use Engtuncay\Phputils8\FiConfigs\FiConfReader;

require __DIR__ . '/vendor/autoload.php';

$fdr = FiConfReader::readConfFile(__DIR__ . '/.env');

echo print_r($fdr->getFkbValue()->getArr(), true);

