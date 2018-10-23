<?php

declare(strict_types=1);

namespace Patterns\Memento;

interface Deadly
{
    public function setDefaultWeapon(string $weapon): void;

    public function doesHaveWeapon(): bool;
}
