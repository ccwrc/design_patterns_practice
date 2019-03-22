<?php

declare(strict_types=1);

namespace Patterns\Observer;

class KeyloggerObserver implements \SplObserver
{
    /**
     * @var int
     */
    static private $counterSubject = 0;
    /**
     * @var int
     */
    static private $counterSubjectImplementsKeylogger = 0;

    public static function getCounterSubject(): int
    {
        return self::$counterSubject;
    }

    public static function getCounterSubjectImplementsKeylogger(): int
    {
        return self::$counterSubjectImplementsKeylogger;
    }

    /**
     * @link https://niebezpiecznik.pl/post/600-milionow-hasel-facebook-wyciek/
     * @param \SplSubject $subject
     * @return null|string
     */
    public function update(\SplSubject $subject): ?string
    {
        if ($subject instanceof KeyloggerSubject) {
            self::$counterSubjectImplementsKeylogger++;
            return 'pass: ' . $subject->getPlainTextPassword() . ' - update the account balance in the bank';
        }
        self::$counterSubject++;
        return null;
    }
}
