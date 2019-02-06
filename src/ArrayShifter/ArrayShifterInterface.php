<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:25
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\ArrayShifter;

interface ArrayShifterInterface
{
    public function shiftArray(array $array) : array;
}
