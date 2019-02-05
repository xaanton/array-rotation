<?php

require_once 'vendor/autoload.php';

use Xeanton\ArrayRotation\ArrayRotation;

$app = new ArrayRotation();

$matrix = $app->run($argv[1], new \Xeanton\ArrayRotation\Factory\HardcodedFactory());
echo $matrix->toString();
