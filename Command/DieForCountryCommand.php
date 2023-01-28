<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Concrete command (pattern implementation)
 */
final class DieForCountryCommand extends Command
{
    public function __construct(private SoldierArmyInterface $soldierArmy)
    {
    }

    public function execute(): void
    {
        $this->soldierArmy->dieForCountry();
    }
}
