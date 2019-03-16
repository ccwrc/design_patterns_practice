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
        $correctTemperature = \rand(AirConditioning::MIN_TEMPERATURE, AirConditioning::MAX_TEMPERATURE);
        $belowMinTemperature = \rand(-274, AirConditioning::MIN_TEMPERATURE - 1);
        $aboveMaxTemperature = \rand(AirConditioning::MAX_TEMPERATURE + 1, 500);

        $ac = new AirConditioning($correctTemperature);

        $ac->setTemperature($aboveMaxTemperature);
        $this->assertEquals(AirConditioning::MAX_TEMPERATURE, $ac->getTemperature());

        $ac->setTemperature($belowMinTemperature);
        $this->assertEquals(AirConditioning::MIN_TEMPERATURE, $ac->getTemperature());

        $ac->setTemperature($correctTemperature);
        $this->assertEquals($correctTemperature, $ac->getTemperature());
    }
}
