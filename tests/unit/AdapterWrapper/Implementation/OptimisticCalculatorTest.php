<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AdapterWrapper\Implementation;

use Patterns\AdapterWrapper\Implementation\OptimisticCalculator;
use PHPUnit\Framework\TestCase;

class OptimisticCalculatorTest extends TestCase
{
    public function testOptimisticCountryBudget(): void
    {
        $optimisticCalculator = new OptimisticCalculator();

        $this->assertTrue($optimisticCalculator->optimisticCountryBudget(1, 800) > 0);
    }
}
