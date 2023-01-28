<?php

declare(strict_types=1);

namespace Patterns\Facade;

interface TvSetInterface
{
    public function turnOn(): string;

    public function disable(): string;

    public function isTurnedOn(): bool;
}
