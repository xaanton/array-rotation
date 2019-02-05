<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:08
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

class Matrix
{
    private $matrix;

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
    }

    public function getRow($index) : array
    {
        return $this->matrix[$index];
    }

    public function getColumn($index) : array
    {
        $column = array();

        for ($i = 0; $i < count($this->matrix); $i++) {
            array_push($column, $this->matrix[$i][$index]);
        }

        return $column;
    }

    public function setRow($index, $row) : void
    {
        $this->matrix[$index] = $row;
    }

    public function setColumn($index, $column) : void
    {
        for ($i = 0; $i < count($column); $i++) {
            $this->matrix[$i][$index] = $column[$i];
        }
    }

    public function getArray() : array
    {
        return $this->matrix;
    }

    public function toString() : string
    {
        $result = '';
        foreach ($this->matrix as $row) {
            foreach ($row as $val) {
                $result = $result . $val;
            }
            $result = $result . '/';
        }
        return substr($result, 0, -1);
    }
}
