<?php
include ('vendor/autoload.php');

use prodigyview\util\FileManager;

$mime = FileManager::getFileMimeType($file);
?>