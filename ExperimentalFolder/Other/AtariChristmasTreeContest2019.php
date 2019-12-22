<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use PHPMailer\PHPMailer\Exception;

/**
 * @link http://atarionline.pl/forum/comments.php?DiscussionID=5179 contest
 */
final class AtariChristmasTreeContest2019
{
    private const ATARI_HOTHEADS = [
        'IRATA4',
        'pin',
        'mgr_inz_rafal',
        'bocianu',
        'Pecet',
        'larek',
        'duncan',
        'bandolier',
        'mysiek'
    ];

    /**
     * @var string[]
     */
    private $supervisorsEmails;

    /**
     * @param string[] $supervisorsEmails
     */
    public function __construct(array $supervisorsEmails)
    {
        $this->supervisorsEmails = self::verifyEmailsFrom($supervisorsEmails);
    }

    /**
     * @throws Exception
     */
    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOneHothead();

        SendEmailFromGmail::sendMailToManyPeopleBcc(
            'Atari Christmas Tree Contest 2019 winner is',
            $winner,
            $this->supervisorsEmails
        );

        return $winner;
    }

    private function drawOneHothead(): string
    {
        $arrayWithoutDuplicates = array_unique(self::ATARI_HOTHEADS, SORT_STRING);

        $first = 0;
        $last = \sizeof($arrayWithoutDuplicates) - 1;
        $winner = \rand($first, $last);

        return (string)$arrayWithoutDuplicates[$winner];
    }

    /**
     * @param string[] $array
     * @return string[]
     */
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
