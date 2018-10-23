<?php

declare(strict_types=1);

namespace Patterns\Memento;

class Hunter implements Deadly
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string|null
     */
    private $weapon;

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
        return $this->weapon === null ? false : true;
    }
}
