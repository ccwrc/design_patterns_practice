<?php

declare(strict_types=1);

namespace Patterns\Command;

abstract class Command
{
    abstract public function execute(SoldierArmyInterface $soldierArmy);
}
