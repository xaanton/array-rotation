<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Xeanton\ArrayRotation\ArrayRotation;

$app = new ArrayRotation();
$factory = new \Xeanton\ArrayRotation\Factory\FactoryLogWrapper(new \Xeanton\ArrayRotation\Factory\HardcodedFactoryFourDim());
$matrix = $app->run(
    $argv[1],
    $factory
);
//echo $matrix->toString();
