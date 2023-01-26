<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

interface OptimisticCalculatorInterface
{
    /**
     * Returns only absolute values.
     */
    public function optimisticAddNumbers(int $number1, int $number2): int;

    /**
     * Returns only absolute values.
     */
    public function optimisticMultiplyNumbers(int $number1, int $number2): int;

    /**
     * Returns only absolute values.
     */
    public function optimisticCountryBudget(int $income, int $expenses): int;
}
