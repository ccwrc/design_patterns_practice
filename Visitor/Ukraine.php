<?php

declare(strict_types=1);

namespace Patterns\Visitor;

use Patterns\Visitor\PatternInterface\{RoleVisitedInterface, VisitorInterface};

final class Ukraine implements CountryInterface, RoleVisitedInterface
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
        $this->legend = '';
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitCountry($this);
    }

    public function createCountryLegend(string $legend): void
    {
        $this->legend = $legend;
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
        if ($this->totalArea <= \abs($area)) {
            $this->totalArea = 0;
            return $this->totalArea;
        }
        return $this->totalArea -= \abs($area);
    }
}
