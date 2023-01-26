<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

final class Calculator implements CalculatorInterface
{
    public function addNumbers(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function multiplyNumbers(int $number1, int $number2): int
    {
        return $number2 * $number2;
    }

    /**
     * @inheritDoc
     */
    public function countryBudget(int $income, int $expenses): int
    {
        return $income - $expenses;
    }

    /**
     * is_countable - new in PHP 7.3
     *
     * @link http://php.net/manual/en/function.is-countable.php doc is_countable
     */
    public static function isSomethingCountable(mixed $something): bool
    {
        return \is_countable($something);
    }
}
