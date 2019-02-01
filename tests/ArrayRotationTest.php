<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;

class ArrayRotationTest extends TestCase
{
    /**
     * @var ArrayRotation
     */
    protected $arrayRotation;

    protected function setUp() : void
    {
        $this->arrayRotation = new ArrayRotation;
    }

    public function testIsInstanceOfArrayRotation() : void
    {
        $actual = $this->arrayRotation;
        $this->assertInstanceOf(ArrayRotation::class, $actual);
    }
}
