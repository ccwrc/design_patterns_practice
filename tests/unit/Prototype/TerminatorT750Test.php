<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Prototype;

use Patterns\Prototype\TerminatorT750;

use PHPUnit\Framework\TestCase;

class TerminatorT750Test extends TestCase
{
    public function testProductionSpeed(): void
    {
        $t750 = new TerminatorT750(6);

        $startProductionClones = \microtime(true);
        for ($i = 1; $i <= 1001; $i++) {
            $clone = clone $t750;
        }
        $endProductionClones = \microtime(true);

        $startProductionObjects = \microtime(true);
        for ($i = 1; $i <= 1001; $i++) {
            $object = new TerminatorT750(5);
        }
        $endProductionObjects = \microtime(true);

        $productionTimeOfClones = $endProductionClones - $startProductionClones;
        $productionTimeOfObjects = $endProductionObjects - $startProductionObjects;

        $this->assertGreaterThan($productionTimeOfClones, $productionTimeOfObjects);
    }
}
