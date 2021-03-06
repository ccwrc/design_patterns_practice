<?php

declare(strict_types=1);

namespace Patterns\ValueObject;

final class ProudUnionSouthAmericanCountries
{
    /**
     * @var string
     */
    private $unionName;
    /**
     * @var SouthAmericanCountry
     */
    private $proudUnionLeader;

    public function __construct(string $unionName, SouthAmericanCountry $proudUnionLeader)
    {
        $this->unionName = $unionName;
        $this->proudUnionLeader = $proudUnionLeader;
    }

    /**
     * That's why it's not Value Object, the class is mutable.
     * @param SouthAmericanCountry $newProudUnionLeader
     */
    public function overthrowLeader(SouthAmericanCountry $newProudUnionLeader): void
    {
        $this->proudUnionLeader = $newProudUnionLeader;
    }
}
