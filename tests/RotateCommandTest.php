<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;
use Xeanton\ArrayRotation\Command\CommandInvoker;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;

class RotateCommandTest extends TestCase
{
    protected $factory;
    protected $invoker;
    protected $expected;

    protected function setUp() : void
    {
        $stubFactory = $this->createMock(HardcodedFactory::class);

        $stubFactory->method('makeMatrix')
            ->willReturn(
                new Matrix(
                    [
                        [1, 2, 3],
                        [4, 5, 6],
                        [7, 8, 9]
                    ]
                )
            );

        $map = [
            ['a',
                new RotateRowCommand(
                    new ArrayShifterStraight(),
                    0,
                    'a'
                )
            ],
            ['i',
                new RotateRowCommand(
                    new ArrayShifterReverse(),
                    0,
                    'i'
                )
            ],
            ['l',
                new RotateColumnCommand(
                    new ArrayShifterStraight(),
                    0,
                    'l'
                )
            ],
            ['f',
                new RotateColumnCommand(
                    new ArrayShifterReverse(),
                    2,
                    'f'
                )
            ]
        ];

        $stubFactory->method('makeCommand')
            ->will(
                $this->returnValueMap($map)
            );

        $this->factory = $stubFactory;

        $stubInvoker = $this->getMockBuilder(CommandInvoker::class)
            ->setMethods(['executeCommand'])
            ->getMock();

        $stubInvoker->method('executeCommand')->will($this->returnCallback(
            function ($command, $matrix) {
                return $command->execute($matrix);
            }
        ));

        $this->invoker = $stubInvoker;

        $this->expected = [
            'a' => [
                [2, 3, 1],
                [4, 5, 6],
                [7, 8, 9]
            ],
            'i' => [
                [3, 1, 2],
                [4, 5, 6],
                [7, 8, 9]
            ],
            'l' => [
                [4, 2, 3],
                [7, 5, 6],
                [1, 8, 9]
            ],
            'f' => [
                [1, 2, 9],
                [4, 5, 3],
                [7, 8, 6]
            ]
        ];
    }

    public function testRotateRowStraight() : void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('a');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertSame($this->expected['a'], $actual);
    }

    public function testRotateRowReverse() : void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('i');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertSame($this->expected['i'], $actual);
    }

    public function testRotateColumnStraight() : void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('l');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertSame($this->expected['l'], $actual);
    }

    public function testRotateColumnReverse() : void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('f');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $this->assertSame($this->expected['f'], $actual, 'Test7');
    }
}
