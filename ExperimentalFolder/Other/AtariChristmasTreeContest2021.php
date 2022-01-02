<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use Patterns\ExperimentalFolder\{MicroLogger, Utils\VerifyEmails};

/**
 * @link https://atarionline.pl/forum/comments.php?DiscussionID=6245 contest
 */
final class AtariChristmasTreeContest2021
{
    public const LINK_TO_CONTEST = 'https://atarionline.pl/forum/comments.php?DiscussionID=6245';

    public const WINNER_PREVIOUS_CONTEST = 'string';

    public const PEOPLE_OF_CARBON_AND_STEEL = [
        'lopez',
        'pustak', // Winner
        'Kroll',
        'tbxx',
        'renton',
        'Pecet',
        'Caesar',
        'Sikor',
    ];

    /**
     * Handle for sending e-mails.
     */
    private SendEmailInterface $sendEmail;

    /**
     * Emails of persons supervising the draw.
     *
     * @var string[]
     */
    private array $supervisorsEmails;

    public function __construct(
        SendEmailInterface $sendEmail,
        array              $supervisorsEmails
    )
    {
        $this->sendEmail = $sendEmail;
        $this->supervisorsEmails = VerifyEmails::verify($supervisorsEmails);
    }

    /**
     * Draws a winner and sends information to supervisors.
     *
     * @throws \Exception
     */
    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOne();

        MicroLogger::addLog('Atari 2021 contest winner: ' . $winner);

        $this->sendEmail::sendMailToManyPeopleBcc(
            'Atari Christmas Tree Contest 2021 winner is...',
            $this->createEmailContent($winner),
            $this->supervisorsEmails
        );

        return $winner;
    }

    /**
     * Draws the winner.
     *
     * @return string
     */
    public function drawOne(): string
    {
        $array = self::PEOPLE_OF_CARBON_AND_STEEL;
        shuffle($array);

        $probablyWinner = $array[array_key_first($array)];
        if (self::WINNER_PREVIOUS_CONTEST === $probablyWinner) {
            shuffle($array);

            return $array[array_key_first($array)];
        }

        return $probablyWinner;
    }

    /**
     * Generates the content of the message for the persons supervising the draw.
     *
     * @param string $winner
     *
     * @return string
     */
    private function createEmailContent(string $winner): string
    {
        return 'Winner: ' . $winner . "\n"
            . 'Number of people of carbon and steel: '
            . count(array_unique(self::PEOPLE_OF_CARBON_AND_STEEL))
            . "\n"
            . 'Link to contest: ' . self::LINK_TO_CONTEST . "\n"
            . "\n"
            . 'Greetings, ' . "\n"
            . 'ccwrc' . "\n";
    }
}
