<?php

declare(strict_types=1);


namespace Xeanton\ArrayRotation\Command;

use Psr\Log\LoggerInterface;
use Xeanton\ArrayRotation\Matrix;

class CommandLogWrapper implements CommandInterface
{
    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @var LoggerInterface
     */
    private $logger;

    private $commandCode;
    private $level;

    public function __construct(
        CommandInterface $command,
        LoggerInterface $logger,
        string $commandCode,
        $level
    ) {
        $this->command = $command;
        $this->logger = $logger;
        $this->commandCode = $commandCode;
        $this->level = $level;
    }

    public function execute(Matrix $matrix) : Matrix
    {
        $new_matrix = $this->command->execute($matrix);
        $message = $this->getMessage($this->command->getCommandCode(), $new_matrix->getArray());
        $this->logger->log($this->level, $message);

        return $new_matrix;
    }

    public function getCommandCode() : string
    {
        return $this->commandCode;
    }

    private function getMessage($execCommandCode, array $result) : string
    {
        $message = 'Result of executing command ' . $execCommandCode . ':' . PHP_EOL;
        $array = $result;
        foreach ($array as $row) {
            foreach ($row as $val) {
                $message = $message . $val;
                for ($i = strlen((string) $val); $i <= 3; $i++) {
                    $message = $message . ' ';
                }
            }
            $message = $message . PHP_EOL;
        }

        return $message . PHP_EOL;
    }
}
