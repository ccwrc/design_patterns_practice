<?php

declare(strict_types=1);

namespace Patterns\Visitor\PatternInterface;

use Patterns\Visitor\CountryInterface;

interface VisitorInterface
{
    public function visitCountry(CountryInterface $country): bool;

    public function visitFriendCountry(CountryInterface $country): bool;
}
