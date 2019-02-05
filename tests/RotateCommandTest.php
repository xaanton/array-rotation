<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 16:18
 */

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\Command\CommandInvoker;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;

class RotateCommandTest extends TestCase
{

    protected $factory;
    protected $invoker;
    protected $expected;

    protected function setUp(): void
    {
        $stubFactory = $this->createMock(HardcodedFactory::class);

        $stubFactory->method('makeMatrix')
            ->willReturn(
                new Matrix(
                    array(
                        array(1, 2, 3),
                        array(4, 5, 6),
                        array(7, 8, 9)
                    )
                )
            );

        $map = array(
            array("a",
                new RotateRowCommand(
                    new ArrayShifterStraight(),
                    0
                )
            ),
            array("i",
                new RotateRowCommand(
                    new ArrayShifterReverse(),
                    0
                )
            ),
            array("l",
                new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    0
                )
            ),
            array("f",
                new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    2
                )
            )
        );

        $stubFactory->method('makeCommand')
            ->will(
                $this->returnValueMap($map)
            );

        $this->factory = $stubFactory;

        $stubInvoker = $this->getMockBuilder(CommandInvoker::class)
            ->setMethods(['executeCommand'])
            ->getMock();

        $stubInvoker->method("executeCommand")->will($this->returnCallback(
            function ($command, $matrix) {
                return $command->execute($matrix);
            }
        ));

        $this->invoker = $stubInvoker;

        $this->expected = array(
            'a' => array(
                        array(2, 3, 1),
                        array(4, 5, 6),
                        array(7, 8, 9)
                    ),
            'i' => array(
                        array(3, 1, 2),
                        array(4, 5, 6),
                        array(7, 8, 9)
                    ),
            'l' => array(
                        array(4, 2, 3),
                        array(7, 5, 6),
                        array(1, 8, 9)
                    ),
            'f' => array(
                        array(1, 2, 9),
                        array(4, 5, 3),
                        array(7, 8, 6)
                    )
        );
    }

    public function testRotateRowStraight(): void
    {

        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('a');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertEquals($this->expected['a'], $actual);
    }

    public function testRotateRowReverse(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('i');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertEquals($this->expected['i'], $actual);
    }

    public function testRotateColumnStraight(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('l');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertEquals($this->expected['l'], $actual);
    }

    public function testRotateColumnReverse(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('f');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertEquals($this->expected['f'], $actual, 'Test7');
    }
}
