<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:04
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterInterface;
use Xeanton\ArrayRotation\Matrix;

class RotateColumnCommand implements CommandInterface
{
    private $index;
    private $arrayShifter;
    private $commandCode;

    public function __construct(
        ArrayShifterInterface $arrayShifter,
        int $index,
        string $commandCode
    ) {
        $this->index = $index;
        $this->arrayShifter = $arrayShifter;
        $this->commandCode = $commandCode;
    }

    public function execute(Matrix $matrix) : Matrix
    {
        $new_matrix = new Matrix($matrix->getArray());
        $new_matrix->setColumn(
            $this->index,
            $this->arrayShifter->shiftArray($new_matrix->getColumn($this->index))
        );

        return $new_matrix;
    }

    public function getCommandCode() : string
    {
        return $this->commandCode;
    }
}
