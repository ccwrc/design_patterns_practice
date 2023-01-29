<?php

declare(strict_types=1);

namespace Patterns\Strategy;

use Patterns\Strategy\PoliceProcedures\{Carjacking, IndecentExposure, Kidnapping, Murder, OtherCrime};

final class ReportingCrimeFactory
{
    public const MURDER = 'murder';
    public const CARJACKING = 'carjacking';
    public const INDECENT_EXPOSURE = 'indecent exposure';
    public const KIDNAPPING = 'kidnapping';
    public const OTHER_CRIME = 'other';

    public static function create(string $crimeType): ReportingCrime
    {
        $newCrimeType = match (strtolower($crimeType)) {
            self::CARJACKING => new Carjacking(),
            self::INDECENT_EXPOSURE => new IndecentExposure(),
            self::KIDNAPPING => new Kidnapping(),
            self::MURDER => new Murder(),
            default => new OtherCrime(),
        };

        return new ReportingCrime($newCrimeType);
    }
}
