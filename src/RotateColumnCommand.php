<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:04
 */

namespace Xeanton\ArrayRotation;

class RotateColumnCommand implements CommandInterface
{
    private $matrix;
    private $index;
    private $arrayShifter;

    public function __construct(Matrix $matrix, ArrayShifterInterface $arrayShifter, $index)
    {
        $this->matrix = $matrix;
        $this->index = $index;
        $this->arrayShifter = $arrayShifter;
    }

    public function execute()
    {
        $this->matrix->setColumn(
            $this->index,
            $this->arrayShifter->shiftArray($this->matrix->getColumn($this->index))
        );
    }
}
