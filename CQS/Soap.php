<?php

declare(strict_types=1);

namespace Patterns\CQS;

/**
 * Hypoallergenic, foaming.
 */
final class Soap
{
    private const int DRYING_TIME_IN_MINUTES = 30;

    private \DateTime $timeToDry;

    public function __construct()
    {
        $this->timeToDry = new \DateTime('now');
    }

    /**
     * Use if you feel dirty.
     *
     * @return void
     * @throws \DateMalformedStringException
     */
    public function washSomethingCommand(): void
    {
        $this->timeToDry = new \DateTime('now + ' . self::DRYING_TIME_IN_MINUTES . ' minutes');
    }

    /**
     * Helpful in calculating the risk of bending down to get the soap.
     *
     * @return bool
     */
    public function isWetQuery(): bool
    {
        $dateTimeNow = new \DateTime('now');

        return $this->timeToDry >= $dateTimeNow;
    }
}
