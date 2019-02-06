<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterInterface;
use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\MatrixPrinterInterface;

class RotateColumnAndPrintCommand implements CommandInterface
{
    private $index;
    private $arrayShifter;
    private $printer;

    public function __construct(
        ArrayShifterInterface $arrayShifter,
        int $index,
        MatrixPrinterInterface $printer
    ) {
        $this->index = $index;
        $this->arrayShifter = $arrayShifter;
        $this->printer = $printer;
    }

    public function execute(Matrix $matrix) : Matrix
    {
        $new_matrix = new Matrix($matrix->getArray());
        $new_matrix->setColumn(
            $this->index,
            $this->arrayShifter->shiftArray($new_matrix->getColumn($this->index))
        );
        $this->printer->printMatrix($new_matrix);

        return $new_matrix;
    }
}
