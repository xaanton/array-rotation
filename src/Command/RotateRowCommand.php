<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:03
 */

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterInterface;
use Xeanton\ArrayRotation\Matrix;

class RotateRowCommand implements CommandInterface
{
    private $index;
    private $arrayShifter;

    public function __construct(ArrayShifterInterface $arrayShifter, int $index)
    {
        $this->index = $index;
        $this->arrayShifter = $arrayShifter;
    }

    public function execute(Matrix $matrix): Matrix
    {
        $new_matrix = new Matrix($matrix->getArray());
        $new_matrix->setRow(
            $this->index,
            $this->arrayShifter->shiftArray($new_matrix->getRow($this->index))
        );
        return $new_matrix;
    }
}
