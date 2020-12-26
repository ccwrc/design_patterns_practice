<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use Patterns\ExperimentalFolder\MicroLogger;

/**
 * @link http://atarionline.pl/forum/comments.php?DiscussionID=5653 contest
 */
final class AtariChristmasTreeContest2020
{
    public const LINK_TO_CONTEST = 'http://atarionline.pl/forum/comments.php?DiscussionID=5653';

    public const PEOPLE_OF_CARBON_AND_STEEL = [
        'bocianu',
        'sun',
        'pustak',
        'Kaz',
        'ZuluGula',
        'Emi',
        'zaxon',
        'mav',
        'xtrem007',
        'string',
        'IRATA4',
    ];

    public const LAST_CONTEST_WINNER = [
        'GRooBY'
    ];

    /**
     * @var SendEmailInterface
     */
    private SendEmailInterface $sendEmail;

    /**
     * @var string[]
     */
    private array $supervisorsEmails;

    public function __construct(
        SendEmailInterface $sendEmail,
        array $supervisorsEmails
    )
    {
        $this->sendEmail = $sendEmail;
        $this->supervisorsEmails = self::verifyEmails($supervisorsEmails);
    }

    /**
     * @throws \Exception
     */
    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOne();

        MicroLogger::addLog('Atari 2020 contest winner: ' . $winner);

        $this->sendEmail::sendMailToManyPeopleBcc(
            'Atari Christmas Tree Contest 2020 winner is...',
            $this->createEmailContent($winner),
            $this->supervisorsEmails
        );

        return $winner;
    }

    /**
     * @return string
     */
    private function drawOne(): string
    {
        $drawingArray = array_merge(
            self::PEOPLE_OF_CARBON_AND_STEEL,
            self::PEOPLE_OF_CARBON_AND_STEEL,
            self::LAST_CONTEST_WINNER //he has already won once, we will reduce his chances :)
        );

        return $drawingArray[array_rand($drawingArray, 1)];
    }

    /**
     * @param string[] $array
     *
     * @return string[]
     */
    private static function verifyEmails(array $array): array
    {
        $verifiedEmails = [];

        foreach ($array as $probablyEmail) {
            if (\filter_var($probablyEmail, FILTER_VALIDATE_EMAIL)) {
                $verifiedEmails[] = $probablyEmail;
            }
        }

        return $verifiedEmails;
    }

    /**
     * @param string $winner
     *
     * @return string
     */
    private function createEmailContent(string $winner): string
    {
        $counter = count(array_merge(self::PEOPLE_OF_CARBON_AND_STEEL, self::LAST_CONTEST_WINNER));

        return 'Winner: ' . $winner . "\n"
            . 'Number of people of carbon and steel: ' . $counter . "\n"
            . 'Link to contest: ' . self::LINK_TO_CONTEST . "\n"
            . "\n"
            . 'Greetings, ' . "\n"
            . 'ccwrc' . "\n";
    }
}
