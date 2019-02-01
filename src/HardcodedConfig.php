<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:42
 */

namespace Xeanton\ArrayRotation;

class HardcodedConfig implements ConfigInterface
{
    public function getArray()
    {
        $array = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        );

        return $array;
    }

    public function getCommand($command_str, Matrix $matrix)
    {
        switch ($command_str) {
            case "a":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    0
                );
            case "b":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    1
                );
            case "c":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    2
                );
            case "i":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    0
                );
            case "h":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    1
                );
            case "g":
                return new RotateRowCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    2
                );
            case "l":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    0
                );
            case "k":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    1
                );
            case "j":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterStraight(),
                    2
                );
            case "d":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    0
                );
            case "e":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    1
                );
            case "f":
                return new RotateColumnCommand(
                    $matrix,
                    new ArrayShifterReverse(),
                    2
                );
        }
        return null;
    }
}
