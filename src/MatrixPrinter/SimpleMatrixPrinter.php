<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 12:29
 */

namespace Xeanton\ArrayRotation\MatrixPrinter;

use Xeanton\ArrayRotation\Matrix;

class SimpleMatrixPrinter implements MatrixPrinterInterface
{
    public function printMatrix(Matrix $matrix)
    {
        $array = $matrix->getArray();
        foreach ($array as $row) {
            foreach ($row as $val) {
                echo $val;
            }
            echo PHP_EOL;
        }
    }
}