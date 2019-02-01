<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:07
 */

namespace Xeanton\ArrayRotation;

class CommandInvoker
{
    public function executeCommand(CommandInterface $command)
    {
        $command->execute();
    }
}
