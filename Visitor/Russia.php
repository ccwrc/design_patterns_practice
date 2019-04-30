<?php

declare(strict_types=1);

namespace Patterns\Visitor;

use Patterns\Visitor\PatternInterface\VisitorInterface;

class Russia implements VisitorInterface
{
    /**
     * Countries must be different, identical = return false
     * @param CountryInterface $country
     * @return bool
     */
    public function visitCountry(CountryInterface $country): bool
    {
        // TODO
        if ($country->getTotalArea() >= 1) {
            $country->totalArea -= 1;
            return true;
        }
        return false;
    }
}
