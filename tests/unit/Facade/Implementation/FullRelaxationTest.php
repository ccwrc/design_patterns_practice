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
        $ac = new AirConditioning($temperature);
        $tvSet = new TvSet();
        $internet = new Internet();

        $fullRelaxation = new FullRelaxation(
            $ac,
            $internet,
            $tvSet
        );
        $fullRelaxation->makeItHappen($newTemperature);

        $this->assertEquals($newTemperature, $ac->getTemperature());
        $this->assertTrue($internet->isOnline());
        $this->assertTrue($tvSet->isTurnedOn());
    }
}
