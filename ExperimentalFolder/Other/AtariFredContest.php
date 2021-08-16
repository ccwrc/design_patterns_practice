<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use Patterns\ExperimentalFolder\MicroLogger;

/**
 * Fun, pandemic, madness and 30 years of Polish Game Fred :)
 *
 * @link https://atarionline.pl/forum/comments.php?DiscussionID=6006&page=1 Competition home page. Polish language.
 *
 * @link https://atariage.com/forums/topic/320398-fred-30th-anniversary-mini-contest/ English, Russian, Spanish, Czech.
 * @link https://www.oldcomp.cz/viewtopic.php?f=23&t=10054 Czech.
 * @link http://tv-games.ru/forum/showthread.php?s=f42fb1076696dd072053d9e774c3ba69&t=6924 Russian.
 * @link https://www.facebook.com/groups/840633719349481/ Atari Chile group.
 * @link http://www.atari.org.pl/forum/viewtopic.php?pid=283229#p283229 Polish.
 */
final class AtariFredContest
{
    public const LINK_TO_CONTEST = 'https://atarionline.pl/forum/comments.php?DiscussionID=6006&page=1';

    public const PEOPLE_OF_CARBON_AND_STEEL = [
        'GRooBY (atarionline.pl)',
        'Barnaba (atarionline.pl)',
        //'pgru (atarionline.pl)', //todo so far it does not meet the requirements
        'Mr.Bacardi (atariage.com)',
        //'devwebcl (atariage.com)', //todo drawings
        'solaris104 (oldcomp.cz)',
    ];

    public const BEST_PHOTOGRAPHY = [
        //todo choose the best photos
        'test photo 1',
        'test photo 2',
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
        $this->supervisorsEmails = self::verifyEmails($supervisorsEmails);
    }

    /**
     * Draws a winner and sends information to supervisors.
     *
     * @throws \Exception
     */
    public function andTheWinnerIs(): string
    {
        $winner = $this->drawOne();

        MicroLogger::addLog('Atari Fred Contest winner: ' . $winner);

        $this->sendEmail::sendMailToManyPeopleBcc(
            'Atari Fred Contest winner is...',
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
    private function drawOne(): string
    {
        return array_rand(array_flip(self::PEOPLE_OF_CARBON_AND_STEEL));
    }

    /**
     * Returns valid email addresses.
     *
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
     * Generates the content of the message for the persons supervising the draw.
     *
     * @param string $winner
     *
     * @return string
     */
    private function createEmailContent(string $winner): string
    {
        $counter = count(array_merge(self::PEOPLE_OF_CARBON_AND_STEEL, self::BEST_PHOTOGRAPHY));

        return 'Winner: ' . $winner . "\n"
            . 'Number of people of carbon and steel: ' . $counter . "\n"
            . 'Link to contest: ' . self::LINK_TO_CONTEST . "\n"
            . "\n"
            . 'Greetings, ' . "\n"
            . 'ccwrc' . "\n";
    }
}
