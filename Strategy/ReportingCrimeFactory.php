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

    /**
     * @param string $crimeType
     *
     * @return ReportingCrime
     */
    public static function create(string $crimeType): ReportingCrime
    {
        switch (strtolower($crimeType)) {
            case self::CARJACKING:
                $newCrimeType = new Carjacking();
                break;
            case self::INDECENT_EXPOSURE:
                $newCrimeType = new IndecentExposure();
                break;
            case self::KIDNAPPING:
                $newCrimeType = new Kidnapping();
                break;
            case self::MURDER:
                $newCrimeType = new Murder();
                break;
            default:
                $newCrimeType = new OtherCrime();
        }

        return new ReportingCrime($newCrimeType);
    }
}
