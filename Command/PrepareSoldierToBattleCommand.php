<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Concrete command (pattern implementation)
 */
final class PrepareSoldierToBattleCommand extends Command
{
    public const CALORIES_FOR_BATTLE = 3500;

    public function __construct(private SoldierArmyInterface $soldierArmy)
    {
    }

    public function execute(): void
    {
        $this->soldierArmy->eatForGloryOfCountry(self::CALORIES_FOR_BATTLE);
    }
}
