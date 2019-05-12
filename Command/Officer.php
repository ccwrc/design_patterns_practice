<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Invoker (pattern implementation)
 */
final class Officer implements CommandInvokerInterface
{
    /**
     * @var Command
     */
    private $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function run(): void
    {
        $this->command->execute();
    }

    /**
     * @param string $jsonToDecode
     */
    public function doesJsonNowThrowExceptions(string $jsonToDecode): void
    {
        json_decode($jsonToDecode, false, 512, JSON_THROW_ON_ERROR);
    }
}
