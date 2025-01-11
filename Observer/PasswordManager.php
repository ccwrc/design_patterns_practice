<?php

declare(strict_types=1);

namespace Patterns\Observer;

final class PasswordManager implements \SplSubject, KeyloggerSubject
{
    private string $plainTextPassword;

    /**
     * @link https://devenv.pl/php-spl-class-splobjectstorage/
     */
    private \SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
        $this->plainTextPassword = '';
    }

    /**
     * Attach an SplObserver
     *
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
     *
     * @link https://php.net/manual/en/splsubject.notify.php
     */
    public function notify(): void
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getPlainTextPassword(): string
    {
        return $this->plainTextPassword;
    }

    /**
     * @link https://stackoverflow.com/questions/47634750/travis-ci-php-7-2-dont-support-argon2i/47678023
     *
     * @throws \Exception
     */
    public function createPasswordHash(string $plainTextPassword): string
    {
        $this->plainTextPassword = $plainTextPassword;
        $this->notify();

        $options = [
            'memory_cost' => PASSWORD_ARGON2_DEFAULT_MEMORY_COST,
            'time_cost' => PASSWORD_ARGON2_DEFAULT_TIME_COST,
            'threads' => PASSWORD_ARGON2_DEFAULT_THREADS
        ];
        $passwordHash = \password_hash($plainTextPassword, PASSWORD_ARGON2I, $options);

        if(!$passwordHash) {
            throw new \Exception('password hash error');
        }

        return $passwordHash;
    }

    public function isPasswordCorrect(
        string $plainTextPassword,
        string $passwordHash
    ): bool
    {
        return \password_verify($plainTextPassword, $passwordHash);
    }

    /**
     * @link http://php.net/manual/en/control-structures.goto.php
     */
    public static function goToHell(?string $trollPassword): string
    {
        if (($trollPassword !== 'go to hell') && ($trollPassword !== null)) {
            goto bloodthirstyDinosaur;
        } elseif ($trollPassword === 'go to hell') {
            goto plainDinosaur;
        }

        plainDinosaur:
        return 'welcome';

        bloodthirstyDinosaur: /** @phpstan-ignore-line */
        return 'go to hell';
    }
}
