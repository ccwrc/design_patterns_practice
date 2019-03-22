<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper\Implementation;

use Patterns\AdapterWrapper\{Calculator, OptimisticCalculatorInterface};

/**
 * Class OptimisticCalculator - Calculator class Adapter
 * @package Patterns\AdapterWrapper\Implementation
 */
final class OptimisticCalculator implements OptimisticCalculatorInterface
{
    /**
     * @var Calculator
     */
    private $calculatorObject;

    public function __construct()
    {
        $this->calculatorObject = new Calculator();
    }

    /**
     * returns only absolute values
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function optimisticAddNumbers(int $number1, int $number2): int
    {
        return \abs($this->calculatorObject->addNumbers($number1, $number2));
    }

    /**
     * returns only absolute values
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function optimisticMultiplyNumbers(int $number1, int $number2): int
    {
        return \abs($this->calculatorObject->multiplyNumbers($number1, $number2));
    }

    /**
     * returns only absolute values
     * @param int $income
     * @param int $expenses
     * @return int
     */
    public function optimisticCountryBudget(int $income, int $expenses): int
    {
        return \abs($this->calculatorObject->countryBudget($income, $expenses));
    }
}
