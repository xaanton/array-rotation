<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 16:18
 */

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Command\CommandInvoker;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;

class RotateCommandTest extends TestCase
{
    /**
     * @var HardcodedFactory
     */
    protected $factory;

    /**
     * @var CommandInvoker
     */
    protected $invoker;

    protected function setUp(): void
    {
        $this->factory = new HardcodedFactory();
        $this->invoker = new CommandInvoker();
    }

    public function testRotateRowStraight(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('a');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $expected = array(
            array(2, 3, 1),
            array(4, 5, 6),
            array(7, 8, 9)
        );
        $this->assertEquals($expected, $actual);
    }

    public function testRotateRowReverse(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('i');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $expected = array(
            array(3, 1, 2),
            array(4, 5, 6),
            array(7, 8, 9)
        );
        $this->assertEquals($expected, $actual);
    }

    public function testRotateColumnStraight(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('l');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $expected = array(
            array(4, 2, 3),
            array(7, 5, 6),
            array(1, 8, 9)
        );
        $this->assertEquals($expected, $actual);
    }

    public function testRotateColumnReverse(): void
    {
        $matrix = $this->factory->makeMatrix();
        $rotateRowCommand = $this->factory->makeCommand('f');
        $actual = $this->invoker->executeCommand($rotateRowCommand, $matrix)->getArray();
        $expected = array(
            array(1, 2, 9),
            array(4, 5, 3),
            array(7, 8, 6)
        );
        $this->assertEquals($expected, $actual, 'Test7');
    }
}
