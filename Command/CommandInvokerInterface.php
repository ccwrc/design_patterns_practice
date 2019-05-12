<?php

declare(strict_types=1);

namespace Patterns\Command;

interface CommandInvokerInterface
{
    public function setCommand(Command $command): void;

    public function run(): void;
}
