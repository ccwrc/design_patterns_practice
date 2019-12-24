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
        'mysiek',
        'renton',
        'TMJ'
    ];

    /**
     * @var string[]
     */
    private array $supervisorsEmails;

    private bool $permissionToSendEmails = false;

    /**
     * @param string[] $supervisorsEmails
     */
    public function __construct(array $supervisorsEmails, bool $permissionToSendEmails = false)
    {
        $this->supervisorsEmails = self::verifyEmailsFrom($supervisorsEmails);
        $this->permissionToSendEmails = $permissionToSendEmails;
    }

    /**
     * @throws Exception
     */
    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOneHothead();

        if ($this->permissionToSendEmails) {
            SendEmailFromGmail::sendMailToManyPeopleBcc(
                'Atari Christmas Tree Contest 2019 winner is',
                $winner,
                $this->supervisorsEmails
            );
        }

        return $winner;
    }

    private function drawOneHothead(): string
    {
        $arrayWithoutDuplicates = \array_unique(self::ATARI_HOTHEADS, SORT_STRING);
        $firstKey = \array_key_first($arrayWithoutDuplicates);
        $lastKey = \array_key_last($arrayWithoutDuplicates);
        $winner = \rand($firstKey, $lastKey);

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
