<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 15:12
 */

namespace Xeanton\ArrayRotation\MatrixPrinter;


use Xeanton\ArrayRotation\Matrix;

class CommandResultPrinter implements MatrixPrinterInterface
{
    private $commandCode;

    public function __construct(string $commandCode)
    {
        $this->commandCode = $commandCode;
    }

    public function printMatrix(Matrix $matrix): void
    {
        echo 'Result of executing command ' . $this->commandCode . ':' . PHP_EOL;
        $array = $matrix->getArray();
        foreach ($array as $row) {
            foreach ($row as $val) {
                echo $val;
                for ($i = strlen($val); $i <= 3; $i++) {
                    echo ' ';
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }
}