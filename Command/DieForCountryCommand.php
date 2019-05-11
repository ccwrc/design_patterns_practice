<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Concrete command
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

    public function execute()
    {
        $this->soldierArmy->dieForCountry();
    }
}
