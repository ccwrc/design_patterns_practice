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
        $location = 69;
        $otherLocation = 11;

        $sarah = new Sarah(false);
        $sarah->changeLocation($location);

        $t1100 = new TerminatorT1100($otherLocation);

        $this->assertFalse($t1100->tryKillSarah($sarah));
        $this->assertTrue($sarah->isLives());
    }

    public function testMaybeKillSarah(): void
    {
        $location = 69;

        $sarah = new Sarah(true);
        $sarah->changeLocation($location);

        $t1100 = new TerminatorT1100($location);

        for ($i = 1; $i <= 10; $i++) {
            if ($sarah->isLives()) {
                $this->assertInternalType('bool', $t1100->tryKillSarah($sarah));
            }
            if (!$sarah->isLives()) {
                $this->assertFalse($t1100->tryKillSarah($sarah));
            }
        }
    }

    public function testGetLocation(): void
    {
        $t1100 = new TerminatorT1100(6);

        $this->assertInternalType('int', $t1100->getLocation());
    }

    public function testSetSerialNumber(): void
    {
        $t1100 = new TerminatorT1100(6);
        if ($t1100->setSerialNumber()) {
            $this->assertInternalType('string', $t1100->getSerialNumber()->toString());
        } else {
            $this->assertInternalType('null', $t1100->getSerialNumber());
        }
    }
}
