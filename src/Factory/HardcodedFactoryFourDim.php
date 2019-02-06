<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 12:09
 */

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\MatrixPrinter\FourDimPrinter;
use Xeanton\ArrayRotation\MatrixPrinter\SimpleMatrixPrinter;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\Matrix;

class HardcodedFactoryFourDim implements FactoryInterface
{
    public function makeMatrix(): Matrix
    {
        $array = array(
            array(1, 2, 3, 4),
            array(5, 6, 7, 8),
            array(9, 10, 11, 12),
            array(13, 14, 15, 16)
        );

        return new Matrix($array);
    }

    public function makeCommand(string $command_type) :CommandInterface
    {
        switch ($command_type) {
            // Straight row shifting
            case "1":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    0
                );
            case "q":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    1
                );
            case "a":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    2
                );
            case "z":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    3
                );
            // Reverse row shifting
            case "5":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    0
                );
            case "t":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    1
                );
            case "g":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    2
                );
            case "b":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    3
                );
            // Straight column shifting
            case "2":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    0
                );
            case "w":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    1
                );
            case "e":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    2
                );
            case "r":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    3
                );
            // Reverse column shifting
            case "x":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    0
                );
            case "s":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    1
                );
            case "d":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    2
                );
            case "f":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    3
                );
            case "print_simple":
                return new PrintMatrixCommand(
                    new FourDimPrinter()
                );
        }
        return null;
    }
}