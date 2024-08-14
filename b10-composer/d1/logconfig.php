<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('logentegre');
$log->pushHandler(new StreamHandler('logs/logdosyam.log', Logger::WARNING));
