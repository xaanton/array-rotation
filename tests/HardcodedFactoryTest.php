<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 16:03
 */

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Command\PrintMatrixCommand;
use Xeanton\ArrayRotation\Command\RotateColumnCommand;
use Xeanton\ArrayRotation\Command\RotateRowCommand;
use Xeanton\ArrayRotation\Factory\HardcodedFactory;

class HardcodedFactoryTest extends TestCase
{
    /**
     * @var HardcodedFactory
     */
    protected $factory;

    protected function setUp() : void
    {
        $this->factory = new HardcodedFactory();
    }

    public function testMakeMatrixTestCaseOne() : void
    {
        $actual = $this->factory->makeMatrix()->getArray();

        $expected = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        );

        $this->assertEquals($expected, $actual);
    }

    public function testMatrixTestCaseTwo() : void
    {
        $actual = $this->factory->makeMatrix();

        $this->assertInstanceOf(Matrix::class, $actual);
    }

    public function testMakeCommandTestCaseOne() : void
    {
        $actual = $this->factory->makeCommand("a");

        $this->assertInstanceOf(RotateRowCommand::class, $actual, "Test2");
    }

    public function testMakeCommandTestCaseTwo() : void
    {
        $actual = $this->factory->makeCommand("i");

        $this->assertInstanceOf(RotateRowCommand::class, $actual, "Test1");
    }

    public function testMakeCommandTestCaseThree() : void
    {
        $actual = $this->factory->makeCommand("k");

        $this->assertInstanceOf(RotateColumnCommand::class, $actual, "Test1");
    }

    public function testMakeCommandTestCaseFour() : void
    {
        $actual = $this->factory->makeCommand("f");

        $this->assertInstanceOf(RotateColumnCommand::class, $actual, "Test1");
    }

    public function testMakeCommandTestCaseFive() : void
    {
        $actual = $this->factory->makeCommand("print_simple");

        $this->assertInstanceOf(PrintMatrixCommand::class, $actual, "Test1");
    }
}
