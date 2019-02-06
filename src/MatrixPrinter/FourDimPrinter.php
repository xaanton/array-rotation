<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 12:23
 */

namespace Xeanton\ArrayRotation\MatrixPrinter;

use Xeanton\ArrayRotation\Matrix;

class FourDimPrinter implements MatrixPrinterInterface
{
    public function printMatrix(Matrix $matrix) : void
    {
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
    }
}