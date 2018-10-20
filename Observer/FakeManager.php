<?php

declare(strict_types=1);

namespace Patterns\Observer;

class FakeManager implements \SplSubject
{
    /**
     * @var \SplObjectStorage
     * @link https://devenv.pl/php-spl-class-splobjectstorage/
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * Attach an SplObserver
     * @link https://php.net/manual/en/splsubject.attach.php
     */
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach an observer
     */
    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * Notify an observer
     * @link https://php.net/manual/en/splsubject.notify.php
     */
    public function notify(): void
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @link http://php.net/manual/en/language.operators.comparison.php
     * @param int $firstNumber
     * @param int $secondNumber
     * @return int
     */
    static public function spaceshipOperator(
        int $firstNumber,
        int $secondNumber
    ): int
    {
        return $firstNumber <=> $secondNumber;
    }
}
