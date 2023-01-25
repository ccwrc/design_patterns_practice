<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade\Implementation;

use Patterns\Facade\{AirConditioning, Internet, TvSet};
use Patterns\Facade\Implementation\FullRelaxation;
use PHPUnit\Framework\TestCase;

class FullRelaxationTest extends TestCase
{
    /**
     * integration test
     */
    public function testMakeItHappen(): void
    {
        $temperature = 18;
        $newTemperature = 17;

        $airConditioning = new AirConditioning($temperature);
        $tvSet = new TvSet();
        $internet = new Internet();

        $fullRelaxation = new FullRelaxation(
            $airConditioning,
            $internet,
            $tvSet
        );
        $fullRelaxation->makeItHappen($newTemperature);

        $this->assertEquals($newTemperature, $airConditioning->getTemperature());
        $this->assertTrue($internet->isOnline());
        $this->assertTrue($tvSet->isTurnedOn());
    }
}
