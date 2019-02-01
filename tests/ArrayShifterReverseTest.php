<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 15:24
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterReverse;

class ArrayShifterReverseTest extends TestCase
{
    /**
     * @var arrayShifterReverse
     */
    protected $arrayShifterReverse;

    protected function setUp() : void
    {
        $this->arrayShifterReverse = new ArrayShifterReverse();
    }

    public function testCaseOne() : void
    {
        $actual = $this->arrayShifterReverse->shiftArray([1,2,3]);
        $expected = [3,1,2];
        $this->assertEquals($expected, $actual);
    }

    public function testCaseTwo() : void
    {
        $actual = $this->arrayShifterReverse->shiftArray([1,2,3,5,6,7,8,9,10]);
        $expected = [10,1,2,3,5,6,7,8,9];
        $this->assertEquals($expected, $actual);
    }
}
