<?php

declare(strict_types=1);

namespace Xeanton\ArrayRotation;

class ArrayRotation
{
    public function run($command_codes, ConfigInterface $config)
    {

        $matrix = new Matrix($config->getArray());
        $invoker = new CommandInvoker();

        foreach ($command_codes as $command_code) {
            $invoker->executeCommand(
                $config->getCommand($command_code, $matrix)
            );
        }
    }
}
