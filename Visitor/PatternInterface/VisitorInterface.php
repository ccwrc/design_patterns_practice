<?php

declare(strict_types=1);

namespace Patterns\Visitor\PatternInterface;

use Patterns\Visitor\CountryInterface;

interface VisitorInterface
{
    /**
     * Countries must be different, identical = return false
     * @param CountryInterface $country
     * @return bool
     */
    public function visitCountry(CountryInterface $country): bool;
}
