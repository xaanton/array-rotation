<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:08
 */

namespace Xeanton\ArrayRotation;

class Matrix
{
    private $matrix;

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
    }

    public function getRow($index)
    {
        return $this->matrix[$index];
    }

    public function getColumn($index)
    {
        $column = array();

        for ($i = 0; $i < count($this->matrix); $i++) {
            array_push($column, $this->matrix[$i][$index]);
        }

        return $column;
    }

    public function setRow($index, $row)
    {
        $this->matrix[$index] = $row;
    }

    public function setColumn($index, $column)
    {
        for ($i = 0; $i < count($column); $i++) {
            $this->matrix[$i][$index] = $column[$i];
        }
    }

    public function printMatrix()
    {
        foreach ($this->matrix as $row) {
            foreach ($row as $val) {
                echo $val;
            }
            echo PHP_EOL;
        }
    }

}
