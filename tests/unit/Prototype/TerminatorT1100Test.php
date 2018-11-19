<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Prototype;

use Patterns\Prototype\{Sarah, TerminatorT1100};

use PHPUnit\Framework\TestCase;

class TerminatorT1100Test extends TestCase
{
    public function testKillSarah(): void
    {
        $location = 69;

        $sarah = new Sarah(false);
        $sarah->changeLocation($location);

        $t1100 = new TerminatorT1100($location);

        $this->assertTrue($t1100->tryKillSarah($sarah));
        $this->assertFalse($sarah->isLives());
    }

    public function testNotKillSarah(): void
    {
        $sarah = new Sarah(false);
        $sarah->changeLocation(5);

        $t1100 = new TerminatorT1100(6);

        $this->assertFalse($t1100->tryKillSarah($sarah));
        $this->assertTrue($sarah->isLives());
    }
}
