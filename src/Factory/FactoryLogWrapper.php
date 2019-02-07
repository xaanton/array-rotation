<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Command\CommandLogWrapper;
use Xeanton\ArrayRotation\Logger\CustomLogger;
use Xeanton\ArrayRotation\Matrix;

class FactoryLogWrapper implements FactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function makeMatrix() : Matrix
    {
        return $this->factory->makeMatrix();
    }

    public function makeCommand(string $command_str) : CommandInterface
    {
        return new CommandLogWrapper(
            $this->factory->makeCommand($command_str),
            new CustomLogger(),
            'log_wrapper',
            $this->getLevelByCode($command_str)
        );
    }

    private function getLevelByCode(string $command_str) : int
    {
        if (strlen($command_str) == 1) {
            return 1;
        }

        return 2;
    }
}
