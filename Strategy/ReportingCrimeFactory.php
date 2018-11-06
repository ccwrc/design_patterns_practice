<?php

declare(strict_types=1);

namespace Patterns\Strategy;

use Patterns\Strategy\PoliceProcedures\{Carjacking, IndecentExposure, Kidnapping, Murder, OtherCrime};

final class ReportingCrimeFactory
{
    /**
     * @param string $crimeType
     * @return ReportingCrime
     */
    static public function create(string $crimeType): ReportingCrime
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
