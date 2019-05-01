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
        if (\get_class($this) === \get_class($country)) {
            return false;
        }

        $country->gettingRidArea(1);
        return true;
    }

    /**
     * @param CountryInterface $country
     * @return bool
     * @throws \ReflectionException
     */
    public function visitFriendCountry(CountryInterface $country): bool
    {
        // TODO desc
        $reflectionObject = new \ReflectionObject($country);
        $totalArea = $reflectionObject->getProperty('totalArea');
        $totalArea->setAccessible(true);
        $totalArea->setValue($country, 0);

        return true;
    }
}
