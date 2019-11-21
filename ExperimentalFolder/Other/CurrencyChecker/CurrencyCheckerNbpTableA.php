<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other\CurrencyChecker;

interface CurrencyCheckerNbpTableA
{
    public const NBP_API_TABLE_A_MAIN_ADDRESS_WITHOUT_DATE = 'http://api.nbp.pl/api/exchangerates/tables/a/';
    public const NBP_API_JSON_MARKER = '/?format=json';
    public const NBP_API_DATE_FORMAT = 'Y-m-d';

    /**
     * Get exchange rates from NBP API http://api.nbp.pl/ (table A, json format).
     * @param \DateTime $dateTime
     * @throws CurrencyCheckerException
     * @return string
     */
    public static function getExchangeRatesBy(\DateTime $dateTime): string;
}
