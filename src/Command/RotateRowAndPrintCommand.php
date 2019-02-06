<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 13:03
 */

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterInterface;
use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\MatrixPrinterInterface;

class RotateRowAndPrintCommand implements CommandInterface
{
    private $index;
    private $arrayShifter;
    private $printer;
    private $commandCode;

    public function __construct(
        ArrayShifterInterface $arrayShifter,
        int $index,
        MatrixPrinterInterface $printer,
        string $commandCode
    ) {
        $this->index = $index;
        $this->arrayShifter = $arrayShifter;
        $this->printer = $printer;
        $this->commandCode = $commandCode;
    }

    public function execute(Matrix $matrix): Matrix
    {
        $new_matrix = new Matrix($matrix->getArray());
        $new_matrix->setRow(
            $this->index,
            $this->arrayShifter->shiftArray($new_matrix->getRow($this->index))
        );
        $this->printExecuteResult($new_matrix);

        return $new_matrix;
    }

    private function printExecuteResult(Matrix $matrix)
    {
        echo 'Result of executing command ' . $this->commandCode . ' ' . PHP_EOL;
        $this->printer->printMatrix($matrix);
        echo PHP_EOL;
    }
}
