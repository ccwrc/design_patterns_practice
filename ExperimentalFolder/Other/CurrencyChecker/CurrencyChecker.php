<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other\CurrencyChecker;

final class CurrencyChecker implements CurrencyCheckerNbpTableA
{
    /**
     * @var string[]
     */
    public static array $dailyExchangeRates = [];

    /**
     * @inheritDoc
     */
    public static function getExchangeRatesBy(\DateTime $dateTime): string
    {
        $dateForNbpApi = self::getNbpFormattedDateFrom($dateTime);

        if (self::isRatesForDayIsPresent($dateForNbpApi)) {
            return self::$dailyExchangeRates[$dateForNbpApi];
        }

        $json = \file_get_contents(self::NBP_API_TABLE_A_MAIN_ADDRESS_WITHOUT_DATE .
            $dateForNbpApi .
            self::NBP_API_JSON_MARKER);

        if (false === $json) {
            throw new CurrencyCheckerException('Date out of range or 404 error.');
        }
        self::$dailyExchangeRates[$dateForNbpApi] = $json;

        return $json;
    }

    private static function getNbpFormattedDateFrom(\DateTime $dateTime): string
    {
        return $dateTime->format(self::NBP_API_DATE_FORMAT);
    }

    private static function isRatesForDayIsPresent(string $dateForNbpApi): bool
    {
        return \array_key_exists($dateForNbpApi, self::$dailyExchangeRates);
    }
}
