<?php

declare(strict_types=1);

namespace Patterns\Visitor\PatternInterface;

use Patterns\Visitor\CountryInterface;

interface VisitorInterface
{
    /**
     * @param CountryInterface $country
     * @return bool
     */
    public function visitCountry(CountryInterface $country): bool;

    /**
     * @param CountryInterface $country
     * @return bool
     */
    public function visitFriendCountry(CountryInterface $country): bool;
}
