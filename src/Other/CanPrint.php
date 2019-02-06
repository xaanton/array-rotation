<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 14:03
 */

namespace Xeanton\ArrayRotation\Other;

use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\MatrixPrinterInterface;

interface CanPrint
{
    public function printOut($dataSource) : void;
}
