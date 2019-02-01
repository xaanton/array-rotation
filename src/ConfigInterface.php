<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2019-02-01
 * Time: 11:40
 */

namespace Xeanton\ArrayRotation;


interface ConfigInterface
{
    public function getArray();
    public function getCommand($command_str, Matrix $matrix);
}