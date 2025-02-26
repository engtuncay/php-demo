<?php

// Composer'ın autoload dosyasını dahil ettik
require_once "vendor/autoload.php";
require_once 'logconfig.php';

//use Monolog\Logger;

// create a log channel
//$log = new Logger('logtesti');
//$log->pushHandler(new StreamHandler('logs/logdosyam.log', Logger::WARNING));

// add records to the log

$log->addWarning('Foo');
$log->addError('Bar');
$log->addWarning('Warning');

