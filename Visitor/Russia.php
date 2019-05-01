<?php

declare(strict_types=1);

namespace Patterns\Visitor;

use Patterns\Visitor\PatternInterface\VisitorInterface;

class Russia implements VisitorInterface
{
    /**
     * @param CountryInterface $country
     * @return bool
     */
    public function visitCountry(CountryInterface $country): bool
    {
        // TODO exception?
        if (\get_class($this) === \get_class($country)) {
            return false;
        }

        $country->gettingRidArea(1);
        return true;
    }
}
