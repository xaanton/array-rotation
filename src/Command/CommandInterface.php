<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 10:01
 */

declare(strict_types=1);

namespace Xeanton\ArrayRotation\Command;

use Xeanton\ArrayRotation\Matrix;

interface CommandInterface
{
    public function execute(Matrix $matrix) : Matrix;

    public function getCommandCode() : string;
}
