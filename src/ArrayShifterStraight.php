<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:29
 */

namespace Xeanton\ArrayRotation;

class ArrayShifterStraight implements ArrayShifterInterface
{
    public function shiftArray($array)
    {
        $array_temp = $array;
        $array[count($array)-1] = $array_temp[0];

        for ($i = count($array_temp)-2; $i >= 0; $i--) {
            $array[$i] = $array_temp[$i+1];
        }
        return $array;
    }
}