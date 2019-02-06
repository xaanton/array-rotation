<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:40
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Factory;

use Xeanton\ArrayRotation\Command\CommandInterface;
use Xeanton\ArrayRotation\Matrix;

interface FactoryInterface
{
    public function makeMatrix() : Matrix;

    public function makeCommand(string $command_str) : CommandInterface;
}
