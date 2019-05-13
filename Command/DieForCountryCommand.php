<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Concrete command (pattern implementation)
 */
final class DieForCountryCommand extends Command
{
    /**
     * @var SoldierArmyInterface
     */
    private $soldierArmy;

    public function __construct(SoldierArmyInterface $soldierArmy)
    {
        $this->soldierArmy = $soldierArmy;
    }

    public function execute(): void
    {
        $this->soldierArmy->dieForCountry();
    }
}
