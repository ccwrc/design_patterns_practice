<?php

declare(strict_types=1);

namespace Patterns\Command;

final class PrepareSoldierToBattleCommand extends Command
{
    public function execute(SoldierArmyInterface $soldierArmy)
    {
        $soldierArmy->eatForGloryOfCountry(3500);
    }
}
