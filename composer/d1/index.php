<?php

// Composer'ın autoload dosyasını dahil ettik
require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('logtesti');
$log->pushHandler(new StreamHandler('logs/logdosyam.log', Logger::WARNING));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');
