<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-05
 * Time: 11:48
 */

namespace Xeanton\ArrayRotation;

use InvokerTest;
use PHPUnit\Framework\TestCase;
use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\CommandInvoker;

class CommandInvokerTest extends TestCase
{
    /**
     * @var CommandInvoker
     */
    protected $commandInvoker;

    protected function setUp(): void
    {
        $this->commandInvoker = new CommandInvoker();
    }

    public function testInvoker()
    {
        $stubMatrix = $this->createMock(Matrix::class);
        $stubCommand = $this->createMock(CommandInterface::class);
        $stubCommand->expects($this->once())
            ->method('execute')
            ->with($this->equalTo($stubMatrix));
        $this->commandInvoker->executeCommand($stubCommand, $stubMatrix);
    }
}
