<?php

declare(strict_types=1);

namespace Patterns\Visitor;

interface CountryInterface
{
    public function createCountryLegend(string $legend): void;

    public function getLegend(): string;

    public function getTotalArea(): int;

    public function gettingRidArea(int $area): int;
}
