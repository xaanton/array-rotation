<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:03
 */

namespace Xeanton\ArrayRotation;


class RotateRowCommand implements CommandInterface
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
        $this->matrix->setRow(
            $this->index,
            $this->arrayShifter->shiftArray($this->matrix->getRow($this->index))
        );
    }
}
