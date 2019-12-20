<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

class AtariChristmasTreeContest2019
{
    private const ATARI_FANS = [
        'fan 1',
        'fan 2',
        'fan 3',
        'fan 4'
    ];

    /**
     * @var string[]
     */
    private $supervisorsEmails;

    public function __construct(array $supervisorsEmails)
    {
        $this->supervisorsEmails = self::verifyEmailsFrom($supervisorsEmails);
    }

    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOneFan();

        // todo sending emails

        return $winner;
    }

    private function drawOneFan(): string
    {
        $first = 0;
        $last = \sizeof(self::ATARI_FANS) - 1;
        $winner = \rand($first, $last);

        return self::ATARI_FANS[$winner];
    }

    private static function verifyEmailsFrom(array $array): array
    {
        $verifiedEmails = [];

        foreach ($array as $probablyEmail) {
            if (\filter_var($probablyEmail, FILTER_VALIDATE_EMAIL)) {
                $verifiedEmails[] = $probablyEmail;
            }
        }

        return $verifiedEmails;
    }
}
