<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Prototype;

use Patterns\Prototype\TerminatorT750;
use PHPUnit\Framework\TestCase;

class TerminatorT750Test extends TestCase
{
    public function testClone(): void
    {
        $location = 69;
        $t750 = new TerminatorT750($location);
        $clone = clone $t750;

        $this->assertInstanceOf(TerminatorT750::class, $clone);
        $this->assertEquals($location, $clone->getLocation());
    }

    /**
     * hrtime - new in PHP 7.3
     * @link http://php.net/manual/en/function.hrtime.php doc hrtime
     */
    public function testProductionSpeed(): void
    {
        $t750 = new TerminatorT750(5);
        $numberOfRepetitions = 2001;

        $startProductionClones = \hrtime(true);
        for ($i = 1; $i <= $numberOfRepetitions; $i++) {
            clone $t750;
        }
        $endProductionClones = \hrtime(true);

        $startProductionObjects = \hrtime(true);
        for ($i = 1; $i <= $numberOfRepetitions; $i++) {
            new TerminatorT750(5);
        }
        $endProductionObjects = \hrtime(true);

        $productionTimeOfClones = $endProductionClones - $startProductionClones;
        $productionTimeOfObjects = $endProductionObjects - $startProductionObjects;

        $this->assertGreaterThan($productionTimeOfClones, $productionTimeOfObjects);
    }
}
