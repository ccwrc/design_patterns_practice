<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\{DieForCountryCommand,
    Officer,
    PrepareSoldierToBattleCommand,
    Soldier,
    SoldierArmyInterface,
    SoldierFactory
};
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testPrepareSoldierToBattleCommand(): void
    {
        $officer = new Officer();
        $soldier = new Soldier('Private', 'Ryan');

        $caloriesCounter = SoldierArmyInterface::INITIAL_CALORIES + PrepareSoldierToBattleCommand::CALORIES_FOR_BATTLE;
        $officer->setCommand(new PrepareSoldierToBattleCommand($soldier));
        $officer->run();

        $this->assertEquals($caloriesCounter, $soldier->getCaloriesInfo());
    }

    public function testDieForCountryCommand(): void
    {
        $officer = new Officer();
        $soldier = new Soldier('Private', 'Adrian Caparzo');
        $anonymousSoldier = SoldierFactory::createSoldier();

        $officer->setCommand(new DieForCountryCommand($soldier));
        $officer->run();
        $this->assertFalse($soldier->isLive());

        $officer->setCommand(new DieForCountryCommand($anonymousSoldier));
        $officer->run();
        $this->assertFalse($anonymousSoldier->isLive());
    }
}
