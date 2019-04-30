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
        // TODO
        $country->gettingRidArea(1);

        return true;
    }
}
