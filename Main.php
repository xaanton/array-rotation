<?php

require_once 'vendor/autoload.php';

use Xeanton\ArrayRotation\ArrayRotation;

$app = new ArrayRotation();

$app->run(str_split($argv[1]), new \Xeanton\ArrayRotation\HardcodedConfig());
