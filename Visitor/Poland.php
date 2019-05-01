<?php

declare(strict_types=1);

namespace Patterns\Visitor;

use Patterns\Visitor\PatternInterface\{RoleVisitedInterface, VisitorInterface};

final class Poland implements CountryInterface, RoleVisitedInterface
{
    /**
     * @var int
     */
    private $totalArea;
    /**
     * @var string
     */
    private $legend;

    public function __construct(int $totalArea)
    {
        $this->totalArea = \abs($totalArea);
        $this->legend = 'https://eszkola.pl/historia/poczatki-panstwa-polskiego-legendy-i-legendarni-wladcy-polski-7038.html';
    }

    public function createCountryLegend(string $legend): void
    {
        // it's already here
    }

    public function getLegend(): string
    {
        return $this->legend;
    }

    public function getTotalArea(): int
    {
        return $this->totalArea;
    }

    public function gettingRidArea(int $area): int
    {
        // try harder
        return $this->totalArea;
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCountry($this);
    }
}
