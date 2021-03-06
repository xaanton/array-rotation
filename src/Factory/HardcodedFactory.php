<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:42
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\SimpleMatrixPrinter;

class HardcodedFactory implements FactoryInterface
{
    public function makeMatrix() : Matrix
    {
        $array = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];

        return new Matrix($array);
    }

    public function makeCommand(string $command_type) : CommandInterface
    {
        switch ($command_type) {
            case 'a':
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    0,
                    $command_type
                );
            case 'b':
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    1,
                    $command_type
                );
            case 'c':
                return new RotateRowCommand(
                    new ArrayShifterStraight(),
                    2,
                    $command_type
                );
            case 'i':
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    0,
                    $command_type
                );
            case 'h':
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    1,
                    $command_type
                );
            case 'g':
                return new RotateRowCommand(
                    new ArrayShifterReverse(),
                    2,
                    $command_type
                );
            case 'l':
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    0,
                    $command_type
                );
            case 'k':
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    1,
                    $command_type
                );
            case 'j':
                return new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    2,
                    $command_type
                );
            case 'd':
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    0,
                    $command_type
                );
            case 'e':
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    1,
                    $command_type
                );
            case 'f':
                return new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    2,
                    $command_type
                );
            case 'print_simple':
                return new PrintMatrixCommand(
                    new SimpleMatrixPrinter(),
                    $command_type
                );
        }

        return null;
    }
}
