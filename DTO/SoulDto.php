<?php

declare(strict_types=1);

namespace Patterns\DTO;

class SoulDto
{
    public readonly array $memories;
    public readonly ?int $timeOnFirstWorld;
    public readonly ?int $sinLevel;

    public function __construct(array $soul)
    {
        $this->memories = $soul['memories'] ?? [];
        $this->timeOnFirstWorld = $soul['timeOnFirstWorld'] ?? null;
        $this->sinLevel = $soul['sinLevel'] ?? 1; //consider 0 (in vitro)
    }

    public function __serialize(): array
    {
        return [
            'memories' => $this->memories,
            'timeOnFirstWorld' => $this->timeOnFirstWorld,
            'sinLevel' => $this->sinLevel
        ];
    }

    public function __unserialize(array $soul): void
    {
        throw new \DomainException('There is no return from hell.');
    }
}
