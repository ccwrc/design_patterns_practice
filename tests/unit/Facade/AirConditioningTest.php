<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade;

use Patterns\Facade\AirConditioning;

use PHPUnit\Framework\TestCase;

class AirConditioningTest extends TestCase
{
    public function testTurnOnAirConditioning(): void
    {
        $airConditioning = new AirConditioning(20);

        $this->assertTrue($airConditioning->turnOnAirConditioning());
    }

    public function testSetTemperature(): void
    {
        $correctTemperature = \rand(AirConditioning::MIN_TEMPERATURE, AirConditioning::MAX_TEMPERATURE);
        $belowMinTemperature = \rand(-274, AirConditioning::MIN_TEMPERATURE - 1);
        $aboveMaxTemperature = \rand(AirConditioning::MAX_TEMPERATURE + 1, 500);

        $airConditioning = new AirConditioning($correctTemperature);

        $airConditioning->setTemperature($aboveMaxTemperature);
        $this->assertEquals(AirConditioning::MAX_TEMPERATURE, $airConditioning->getTemperature());

        $airConditioning->setTemperature($belowMinTemperature);
        $this->assertEquals(AirConditioning::MIN_TEMPERATURE, $airConditioning->getTemperature());

        $airConditioning->setTemperature($correctTemperature);
        $this->assertEquals($correctTemperature, $airConditioning->getTemperature());
    }
}
