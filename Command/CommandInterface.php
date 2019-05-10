<?php

declare(strict_types=1);

namespace Patterns\Command;

interface CommandInterface
{
    public function dieForCountry(): void;

    public function shootForCountry(): void;

    public function eatForGloryOfCountry(): void;
}
