<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:42
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\MatrixPrinter\SimpleMatrixPrinter;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\Matrix;

class HardcodedFactory implements FactoryInterface
{
    public function makeMatrix(): Matrix
    {
        $array = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        );

        return new Matrix($array);
    }

    public function makeCommand(string $command_type) :CommandInterface
    {
        switch ($command_type) {
            case "a":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    0
                );
            case "b":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    1
                );
            case "c":
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    2
                );
            case "i":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    0
                );
            case "h":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    1
                );
            case "g":
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    2
                );
            case "l":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    0
                );
            case "k":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    1
                );
            case "j":
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    2
                );
            case "d":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    0
                );
            case "e":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    1
                );
            case "f":
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    2
                );
            case "print_simple":
                return new PrintMatrixCommand(
                    new SimpleMatrixPrinter()
                );
        }
        return null;
    }
}
