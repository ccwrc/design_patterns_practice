<?php

declare(strict_types=1);

namespace Patterns\Strategy;

use Patterns\Strategy\PatternInterface\CrimeType;

final class ReportingCrime
{
    private \DateTime $notificationTimeOfCrime;

    private CrimeType $crimeType;

    public function __construct(CrimeType $crimeType)
    {
        $this->notificationTimeOfCrime = new \DateTime('now');
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

    public function getNotificationTimeOfCrime(): \DateTime
    {
        return $this->notificationTimeOfCrime;
    }
}
