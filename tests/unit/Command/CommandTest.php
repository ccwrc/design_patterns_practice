<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\{DieForCountryCommand, Officer, PrepareSoldierToBattleCommand, Soldier};

use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testPrepareSoldierToBattleCommand(): void
    {
        $officer = new Officer();
        $soldier = new Soldier('Private', 'Ryan');

        $officer->setCommand(new PrepareSoldierToBattleCommand($soldier));
        $officer->run();

        $this->assertEquals(3510, $soldier->getCaloriesInfo());
    }

    public function testDieForCountryCommand(): void
    {
        $officer = new Officer();
        $soldier = new Soldier('Private', 'Adrian Caparzo');

        $officer->setCommand(new DieForCountryCommand($soldier));
        $officer->run();

        $this->assertFalse($soldier->isLive());
    }
}
