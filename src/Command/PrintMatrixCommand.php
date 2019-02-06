<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 12:32
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\MatrixPrinterInterface;

class PrintMatrixCommand implements CommandInterface
{
    private $printer;

    public function __construct(MatrixPrinterInterface $printer)
    {
        $this->printer = $printer;
    }

    public function execute(Matrix $matrix) : Matrix
    {
        $this->printer->printMatrix(
            $matrix
        );

        return $matrix;
    }
}
