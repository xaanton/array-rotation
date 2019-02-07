<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation\MatrixPrinter;

use Xeanton\ArrayRotation\Matrix;

class CommandResultPrinter implements MatrixPrinterInterface
{
    private $commandCode;

    public function __construct(string $commandCode)
    {
        $this->commandCode = $commandCode;
    }

    public function printMatrix(Matrix $matrix) : void
    {
        echo 'Result of executing command ' . $this->commandCode . ':' . PHP_EOL;
        $array = $matrix->getArray();
        foreach ($array as $row) {
            foreach ($row as $val) {
                echo $val;
                for ($i = strlen((string) $val); $i <= 3; $i++) {
                    echo ' ';
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }
}
