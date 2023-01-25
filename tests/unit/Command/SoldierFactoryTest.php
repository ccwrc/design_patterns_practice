<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\{ SoldierArmyInterface, SoldierFactory};
use PHPUnit\Framework\TestCase;

class SoldierFactoryTest extends TestCase
{
    public function testCreateFillUpSoldier(): void
    {
        $fillUpSoldier = SoldierFactory::createFillUpSoldier();
        $caloriesCounter = SoldierArmyInterface::INITIAL_CALORIES + SoldierFactory::CALORIES_TO_FILL_UP;

        $this->assertEquals($caloriesCounter, $fillUpSoldier->getCaloriesInfo());
    }
}
