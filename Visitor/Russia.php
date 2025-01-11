<?php

declare(strict_types=1);

namespace Patterns\Visitor;

use Patterns\Visitor\PatternInterface\VisitorInterface;

final class Russia implements VisitorInterface
{
    public function visitCountry(CountryInterface $country): bool
    {
        if (\get_class($this) === \get_class($country)) { /* @phpstan-ignore-line */
            return false;
        }

        $country->gettingRidArea(1);

        return true;
    }

    /**
     * Screw good practices, it's Russia!
     */
    public function visitFriendCountry(CountryInterface $country): bool
    {
        try {
            $reflectionObject = new \ReflectionObject($country);
            $totalArea = $reflectionObject->getProperty('totalArea');
            $totalArea->setAccessible(true);
            $totalArea->setValue($country, 0);
        } catch (\Throwable) {
            return false;
        }

        return true;
    }
}
