<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

use Xeanton\ArrayRotation\Command\CommandInvoker;
use Xeanton\ArrayRotation\Factory\FactoryInterface;

class ArrayRotation
{
    public function run(array $command_codes, FactoryInterface $config)
    {
        $matrix = $config->makeMatrix();
        $invoker = new CommandInvoker();

        foreach ($command_codes as $command_code) {
            $matrix = $invoker->executeCommand(
                $config->makeCommand($command_code),
                $matrix
            );
        }
    }
}
