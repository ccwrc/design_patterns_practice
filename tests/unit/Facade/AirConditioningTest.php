<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade;

use Patterns\Facade\AirConditioning;

use PHPUnit\Framework\TestCase;

class AirConditioningTest extends TestCase
{
    public function testTurnOnAirConditioning(): void
    {
        $ac = new AirConditioning(20);

        $this->assertTrue($ac->turnOnAirConditioning());
    }

    public function testSetTemperature(): void
    {
        $ac = new AirConditioning(15);

        $ac->setTemperature(300);
        $this->assertEquals(25, $ac->getTemperature());

        $ac->setTemperature(-300);
        $this->assertEquals(-5, $ac->getTemperature());

        $ac->setTemperature(13);
        $this->assertEquals(13, $ac->getTemperature());
    }
}
