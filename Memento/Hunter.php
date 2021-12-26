<?php

declare(strict_types=1);

namespace Patterns\Memento;

class Hunter implements Deadly
{
    private string $name;

    private ?string $weapon = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setDefaultWeapon(string $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function doesHaveWeapon(): bool
    {
        return !($this->weapon === null);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
