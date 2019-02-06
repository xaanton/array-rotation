<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 12:29
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\MatrixPrinter;

use Xeanton\ArrayRotation\Matrix;

class SimpleMatrixPrinter implements MatrixPrinterInterface
{
    public function printMatrix(Matrix $matrix) : void
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
