<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 12:26
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\MatrixPrinter;

use Xeanton\ArrayRotation\Matrix;

interface MatrixPrinterInterface
{
    public function printMatrix(Matrix $matrix) : void;
}
