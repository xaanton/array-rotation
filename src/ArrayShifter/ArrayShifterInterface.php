<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:25
 */

namespace Xeanton\ArrayRotation\ArrayShifter;

interface ArrayShifterInterface
{
    public function shiftArray(array $array): array;
}