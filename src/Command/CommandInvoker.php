<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:07
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\Matrix;

class CommandInvoker
{
    public function executeCommand(CommandInterface $command, Matrix $matrix): Matrix
    {
        return $command->execute($matrix);
    }
}
