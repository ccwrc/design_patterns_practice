<?php

declare(strict_types=1);

namespace Patterns\ValueObject;

/**
 * Value Object: without their own identity (no id), small, immutable, always correct after creation.
 */
final class SouthAmericanCountry implements \Stringable
{
    public const COUNTRIES_LIST = [
        'Brazil',
        'Colombia',
        'Argentina',
        'Peru',
        'Venezuela',
        'Chile',
        'Ecuador',
        'Bolivia',
        'Paraguay',
        'Uruguay',
        'Guyana',
        'Suriname',
        'French Guiana',
        'Falkland Islands'
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!\in_array($value, self::COUNTRIES_LIST, true)) {
            throw new \InvalidArgumentException('Invalid country name');
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $southAmericanCountry): bool
    {
        return $this->value === $southAmericanCountry->value;
    }
}
