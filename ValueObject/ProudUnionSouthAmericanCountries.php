<?php

declare(strict_types=1);

namespace Patterns\ValueObject;

/**
 * Non Value Object.
 */
final class ProudUnionSouthAmericanCountries
{
    private string $unionName;

    private SouthAmericanCountry $proudUnionLeader;

    public function __construct(
        string $unionName,
        SouthAmericanCountry $proudUnionLeader
    )
    {
        $this->unionName = $unionName;
        $this->proudUnionLeader = $proudUnionLeader;
    }

    /**
     * That's why it's not Value Object, the class is mutable.
     */
    public function overthrowLeader(SouthAmericanCountry $newProudUnionLeader): void
    {
        $this->proudUnionLeader = $newProudUnionLeader;
    }
}
