<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php55features;

use Patterns\ExperimentalFolder\MicroLogger;
use Patterns\ExperimentalFolder\Php55features\GeneratorFeature;

use PHPUnit\Framework\TestCase;

class GeneratorFeatureTest extends TestCase
{
    /**
     * My results:
     * 45 142 016 (bytes) used memory - $generator->operateOnFileNoUseGenerator();
     * 15 777 792 (bytes) used memory - $generator->operateOnFileWithGenerator();
     */
    public function testMemoryGetPeakUsageWithGenerator(): int
    {
        $generator = new GeneratorFeature(300000);

        $generator->operateOnFileWithGenerator();
        $memoryPeakUsage = memory_get_peak_usage(true);
        MicroLogger::addLog('Test memory with Generator: ' . $memoryPeakUsage);

        $this->assertGreaterThan(1, $memoryPeakUsage);

        return $memoryPeakUsage;
    }

    /**
     * My results:
     * 45 142 016 (bytes) used memory - $generator->operateOnFileNoUseGenerator();
     * 15 777 792 (bytes) used memory - $generator->operateOnFileWithGenerator();
     *
     * @depends testMemoryGetPeakUsageWithGenerator
     */
    public function testMemoryGetPeakUsageNoGenerator(int $memoryPeakUsageWithGenerator): void
    {
        $generator = new GeneratorFeature(300000);

        $generator->operateOnFileNoUseGenerator();
        $memoryPeakUsageNoGenerator = memory_get_peak_usage(true);
        MicroLogger::addLog('Test memory no Generator: ' . $memoryPeakUsageNoGenerator);

        $this->assertGreaterThan($memoryPeakUsageWithGenerator, $memoryPeakUsageNoGenerator);
    }
}
