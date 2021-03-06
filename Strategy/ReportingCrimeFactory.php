<?php

declare(strict_types=1);

namespace Patterns\Strategy;

use Patterns\Strategy\PoliceProcedures\{Carjacking, IndecentExposure, Kidnapping, Murder, OtherCrime};

final class ReportingCrimeFactory
{
    public const MURDER = 'murder';
    public const CARJACKING = 'carjacking';
    public const INDECENT_EXPOSURE = 'indecentexposure';
    public const KIDNAPPING = 'kidnapping';
    public const OTHER_CRIME = 'other';

    /**
     * @param string $crimeType
     * @return ReportingCrime
     */
    public static function create(string $crimeType): ReportingCrime
    {
        switch (strtolower($crimeType)) {
            case 'carjacking':
                $newCrimeType = new Carjacking();
                break;
            case 'indecentexposure':
                $newCrimeType = new IndecentExposure();
                break;
            case 'kidnapping':
                $newCrimeType = new Kidnapping();
                break;
            case 'murder':
                $newCrimeType = new Murder();
                break;
            default:
                $newCrimeType = new OtherCrime();
        }

        return new ReportingCrime($newCrimeType);
    }
}
