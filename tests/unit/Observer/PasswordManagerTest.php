<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Observer;

use Patterns\Observer\PasswordManager;
use PHPUnit\Framework\TestCase;

class PasswordManagerTest extends TestCase
{
    public function testCreatePasswordHash(): void
    {
        $passwordManager = new PasswordManager();
        $plainText = 'plain pass';
        try {
            $passwordHash = $passwordManager->createPasswordHash($plainText);
        } catch (\Throwable $error) {
            $passwordHash = false;
        }

        $this->assertIsString($passwordHash);
        $this->assertNotSame($plainText, $passwordHash);
    }

    public function testIsPasswordCorrect(): void
    {
        $passwordManager = new PasswordManager();
        $correctPassword = 'secret password';
        $fakePassword = 'fake password';
        $correctPasswordHash = '$argon2i$v=19$m=1024,t=2,p=2$andncW5jUC5ZLkZXMTJybw$OPJuhsqyTvZFkOzQUZOkh54UmEQZo2sJWvHDpflZBYI';

        $this->assertTrue($passwordManager->isPasswordCorrect($correctPassword, $correctPasswordHash));
        $this->assertFalse($passwordManager->isPasswordCorrect($fakePassword, $correctPasswordHash));
    }

    public function testGoToHell(): void
    {
        $this->assertIsString(PasswordManager::goToHell('rand ' . rand(1, 155)));
        $this->assertSame('go to hell', PasswordManager::goToHell('any string'));
        $this->assertSame('welcome', PasswordManager::goToHell('go to hell'));
        $this->assertSame('welcome', PasswordManager::goToHell(null));
    }
}
