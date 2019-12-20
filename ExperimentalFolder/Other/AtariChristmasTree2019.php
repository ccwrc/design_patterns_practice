<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

class AtariChristmasTree2019
{
    private const ATARI_FANS = [
        'fan 1',
        'fan 2',
        'fan 3',
        'fan 4',
    ];

    /**
     * @var string[]
     */
    private array $supervisorsEmails;

    public function __construct(array $supervisorsEmails)
    {
        $this->supervisorsEmails = self::verifyEmailsFrom($supervisorsEmails);
    }

    public function drawOneFan(): string
    {
        $first = 0;
        // todo
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
