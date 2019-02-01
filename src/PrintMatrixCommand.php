<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 12:32
 */

namespace Xeanton\ArrayRotation;

class PrintMatrixCommand implements CommandInterface
{
    private $matrix;
    private $printer;

    public function __construct(Matrix $matrix, MatrixPrinterInterface $printer)
    {
        $this->matrix = $matrix;
        $this->printer = $printer;
    }

    public function execute()
    {
        $this->printer->printMatrix(
            $this->matrix
        );
    }
}