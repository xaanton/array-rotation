<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation\Logger;

use Psr\Log\LoggerInterface;

class CustomLogger implements LoggerInterface
{
    public function notice($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function error($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function debug($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function warning($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function critical($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function emergency($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function log($level, $message, array $context = []) : void
    {
        echo 'Level = ' . $level . PHP_EOL;
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function alert($message, array $context = []) : void
    {
        echo $message . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }

    public function info($message, array $context = []) : void
    {
        echo $message . print_r($context) . PHP_EOL;
        if (count($context) > 0) {
            echo print_r($context) . PHP_EOL;
        }
    }
}
