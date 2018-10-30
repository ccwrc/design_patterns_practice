<?php

declare(strict_types=1);

namespace Patterns\Strategy;

use Patterns\Strategy\PatternInterface\CrimeType;

final class ReportingCrime
{
    /**
     * @var \DateTime
     */
    private $notificationTime;
    /**
     * @var CrimeType
     */
    private $crimeType;

    public function __construct(CrimeType $crimeType)
    {
        $this->notificationTime = new \DateTime();
        $this->crimeType = $crimeType;
    }

    public function getCrimeCode(): string
    {
        return $this->crimeType->getCode();
    }

    public function getCrimeProcedure(): string
    {
        return $this->crimeType->getProcedure();
    }
}
