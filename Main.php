<?php

require_once 'vendor/autoload.php';

use Xeanton\ArrayRotation\ArrayRotation;

$app = new ArrayRotation();

$command_codes = str_split($argv[1]);
array_push($command_codes, 'print_simple');

$app->run($command_codes, new \Xeanton\ArrayRotation\HardcodedConfig());
