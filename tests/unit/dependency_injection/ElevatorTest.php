<?php

declare(strict_types=1);

namespace Patterns\tests\unit\dependency_injection;

use Patterns\dependency_injection\Elevator;
use Patterns\dependency_injection\Floor;
use Patterns\dependency_injection\Rope;

use PHPUnit\Framework\TestCase;

class ElevatorTest extends TestCase
{
    public function testCreate(): Elevator
    {
        $elevator = new Elevator(
            new Rope(12,12),
            new Floor(6)
        );
        $this->assertInstanceOf(Elevator::class, $elevator);

        return $elevator;
    }

    /**
     * @depends testCreate
     * @param $elevator Elevator
     */
    public function testTryCutRope(Elevator $elevator): void
    {
        $this->assertStringMatchesFormat('Help!', $elevator->tryCutRope());
    }

    /**
     * @depends testCreate
     * @param $elevator Elevator
     */
    public function testShowMaxStrength(Elevator $elevator): void
    {
        $this->assertEquals(6, $elevator->showMaxStrength());
    }
}
