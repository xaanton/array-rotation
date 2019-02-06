<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation;

use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\CommandInvoker;

class CommandInvokerTest extends TestCase
{
    /**
     * @var CommandInvoker
     */
    protected $commandInvoker;

    protected function setUp() : void
    {
        $this->commandInvoker = new CommandInvoker();
    }

    public function testInvoker() : void
    {
        $stubMatrix = $this->createMock(Matrix::class);
        $stubCommand = $this->createMock(CommandInterface::class);
        $stubCommand->expects($this->once())
            ->method('execute')
            ->with($this->equalTo($stubMatrix));
        $this->commandInvoker->executeCommand($stubCommand, $stubMatrix);
    }
}
