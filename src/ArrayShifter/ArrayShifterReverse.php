<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:30
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\ArrayShifter;

class ArrayShifterReverse implements ArrayShifterInterface
{
    public function shiftArray(array $array): array
    {
        $array_temp = $array;
        $array[0] = $array_temp[count($array_temp)-1];

        for ($i = 1; $i < count($array_temp); $i++) {
            $array[$i] = $array_temp[$i-1];
        }
        return $array;
    }
}