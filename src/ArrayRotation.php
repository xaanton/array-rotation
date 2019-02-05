<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

use Xeanton\ArrayRotation\Command\CommandInvoker;
use Xeanton\ArrayRotation\Factory\FactoryInterface;

class ArrayRotation
{
    public function run(string $command_codes, FactoryInterface $config)
    {
        $command_codes_array = str_split($command_codes);
        //array_push($command_codes_array, 'print_simple');
        $matrix = $config->makeMatrix();
        $invoker = new CommandInvoker();

        foreach ($command_codes_array as $command_code) {
            $matrix = $invoker->executeCommand(
                $config->makeCommand($command_code),
                $matrix
            );
        }

        return $matrix;
    }
}
