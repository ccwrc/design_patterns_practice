<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\Officer;

use Patterns\Command\PrepareSoldierToBattleCommand;
use Patterns\Command\Soldier;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testPrepareSoldierToBattle(): void
    {
        $officer = new Officer();
        $soldier = new Soldier('Private', 'Ryan');

        $officer->setCommand(new PrepareSoldierToBattleCommand($soldier));
        $officer->run();

        $this->assertEquals(3510, $soldier->getCaloriesInfo());
    }
}
