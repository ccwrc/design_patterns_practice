<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper\Implementation;

use Patterns\AdapterWrapper\{Calculator, OptimisticCalculatorInterface};

/**
 * Class OptimisticCalculator - Calculator class Adapter
 *
 * @package Patterns\AdapterWrapper\Implementation
 */
final class OptimisticCalculator implements OptimisticCalculatorInterface
{
    private Calculator $calculatorObject;

    public function __construct()
    {
        $this->calculatorObject = new Calculator();
    }

    /**
     * @inheritDoc
     */
    public function optimisticAddNumbers(int $number1, int $number2): int
    {
        return \abs($this->calculatorObject->addNumbers($number1, $number2));
    }

    /**
     * @inheritDoc
     */
    public function optimisticMultiplyNumbers(int $number1, int $number2): int
    {
        return \abs($this->calculatorObject->multiplyNumbers($number1, $number2));
    }

    /**
     * @inheritDoc
     */
    public function optimisticCountryBudget(int $income, int $expenses): int
    {
        return \abs($this->calculatorObject->countryBudget($income, $expenses));
    }
}
