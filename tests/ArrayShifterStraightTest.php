<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 15:38
 */

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\ArrayShifter\ArrayShifterStraight;

class ArrayShifterStraightTest extends TestCase
{
    /**
     * @var arrayShifterStraight
     */
    protected $arrayShifterStraight;

    protected function setUp() : void
    {
        $this->arrayShifterStraight = new ArrayShifterStraight();
    }

    public function testCaseOne() : void
    {
        $actual = $this->arrayShifterStraight->shiftArray([1,2,3]);
        $expected = [2,3,1];
        $this->assertEquals($expected, $actual);
    }

    public function testCaseTwo() : void
    {
        $actual = $this->arrayShifterStraight->shiftArray([1,2,3,5,6,7,8,9,10]);
        $expected = [2,3,5,6,7,8,9,10,1];
        $this->assertEquals($expected, $actual);
    }
}
