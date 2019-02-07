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
    private $commandCode;

    public function __construct(MatrixPrinterInterface $printer, string $commandCode)
    {
        $this->printer = $printer;
        $this->commandCode = $commandCode;
    }

    public function execute(Matrix $matrix) : Matrix
    {
        $this->printer->printMatrix(
            $matrix
        );

        return $matrix;
    }

    public function getCommandCode() : string
    {
        return $this->commandCode;
    }
}
