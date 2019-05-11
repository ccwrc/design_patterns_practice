<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Invoker
 */
final class Officer
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
}
