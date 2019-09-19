<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php55features;

use Patterns\ExperimentalFolder\MicroLogger;
use Patterns\ExperimentalFolder\Php55features\GeneratorFeature;

use PHPUnit\Framework\TestCase;

class GeneratorFeatureTest extends TestCase
{
    /**
     * Run tests twice (switch comment/uncomment lines) and look at MicroLogger.txt file.
     * Above file in Patterns\ExperimentalFolder\MicroLogger.txt
     *
     * My results:
     * 45 142 016 (bytes) used memory - $generator->operateOnFileNoUseGenerator();
     * 15 777 792 (bytes) used memory - $generator->operateOnFileWithGenerator();
     */
    public function testMemoryGetPeakUsage(): void
    {
        $generator = new GeneratorFeature(300000);

        // Comment/uncomment the following two lines:
        //$generator->operateOnFileNoUseGenerator();
        //MicroLogger::addLog('Test memory no Generator: ' . memory_get_peak_usage(true));

        // Comment/uncomment the following two lines:
        $generator->operateOnFileWithGenerator();
        MicroLogger::addLog('Test memory with Generator: ' . memory_get_peak_usage(true));

        $this->markTestSkipped('Memory test.');
    }
}
