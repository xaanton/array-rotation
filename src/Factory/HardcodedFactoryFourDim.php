<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\MatrixPrinter\FourDimPrinter;

class HardcodedFactoryFourDim implements FactoryInterface
{
    public function makeMatrix() : Matrix
    {
        $array = [
            [1, 2, 3, 4],
            [5, 6, 7, 8],
            [9, 10, 11, 12],
            [13, 14, 15, 16]
        ];

        return new Matrix($array);
    }

    public function makeCommand(string $command_type) : CommandInterface
    {
        switch ($command_type) {
            // Straight row shifting
            case '1':
                return new RotateRowCommand(new ArrayShifterStraight(), 0, $command_type);
            case 'q':
                return new RotateRowCommand(new ArrayShifterStraight(), 1, $command_type);
            case 'a':
                return new RotateRowCommand(new ArrayShifterStraight(), 2, $command_type);
            case 'z':
                return new RotateRowCommand(new ArrayShifterStraight(), 3, $command_type);
            // Reverse row shifting
            case '5':
                return new RotateRowCommand(new ArrayShifterReverse(), 0, $command_type);
            case 't':
                return new RotateRowCommand(new ArrayShifterReverse(), 1, $command_type);
            case 'g':
                return new RotateRowCommand(new ArrayShifterReverse(), 2, $command_type);
            case 'b':
                return new RotateRowCommand(new ArrayShifterReverse(), 3, $command_type);
            // Straight column shifting
            case '2':
                return new RotateColumnCommand(new ArrayShifterStraight(), 0, $command_type);
            case 'w':
                return new RotateColumnCommand(new ArrayShifterStraight(), 1, $command_type);
            case 'e':
                return new RotateColumnCommand(new ArrayShifterStraight(), 2, $command_type);
            case 'r':
                return new RotateColumnCommand(new ArrayShifterStraight(), 3, $command_type);
            // Reverse column shifting
            case 'x':
                return new RotateColumnCommand(new ArrayShifterReverse(), 0, $command_type);
            case 's':
                return new RotateColumnCommand(new ArrayShifterReverse(), 1, $command_type);
            case 'd':
                return new RotateColumnCommand(new ArrayShifterReverse(), 2, $command_type);
            case 'f':
                return new RotateColumnCommand(new ArrayShifterReverse(), 3, $command_type);
            case 'print_simple':
                return new PrintMatrixCommand(new FourDimPrinter(), $command_type);
        }

        return null;
    }
}
