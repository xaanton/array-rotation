<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-06
 * Time: 12:56
 */

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\RotateColumnAndPrintCommand;
use Xeanton\ArrayRotation\Command\RotateRowAndPrintCommand;
use Xeanton\ArrayRotation\MatrixPrinter\CommandResultPrinter;
use Xeanton\ArrayRotation\MatrixPrinter\FourDimPrinter;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\Matrix;
use Xeanton\ArrayRotation\Other\CanPrint;

class FactoryFourDimPrintAfterCommand implements FactoryInterface
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
                return new RotateRowAndPrintCommand(
                    new ArrayShifterStraight(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "q":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterStraight(),
                    1,
                    new CommandResultPrinter($command_type)
                );
            case "a":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterStraight(),
                    2,
                    new CommandResultPrinter($command_type)
                );
            case "z":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterStraight(),
                    3,
                    new CommandResultPrinter($command_type)
                );
            // Reverse row shifting
            case "5":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterReverse(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "t":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterReverse(),
                    1,
                    new CommandResultPrinter($command_type)
                );
            case "g":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterReverse(),
                    2,
                    new CommandResultPrinter($command_type)
                );
            case "b":
                return new RotateRowAndPrintCommand(
                    new ArrayShifterReverse(),
                    3,
                    new CommandResultPrinter($command_type)
                );
            // Straight column shifting
            case "2":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterStraight(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "w":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterStraight(),
                    1,
                    new CommandResultPrinter($command_type)
                );
            case "e":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterStraight(),
                    2,
                    new CommandResultPrinter($command_type)
                );
            case "r":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterStraight(),
                    3,
                    new CommandResultPrinter($command_type)
                );
            // Reverse column shifting
            case "x":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterReverse(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "s":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterReverse(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "d":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterReverse(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "f":
                return new RotateColumnAndPrintCommand(
                    new ArrayShifterReverse(),
                    0,
                    new CommandResultPrinter($command_type)
                );
            case "print_simple":
                return new PrintMatrixCommand(
                    new FourDimPrinter()
                );
        }
        return null;
    }
}
