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
        } catch (\Exception $exception) {
            $passwordHash = false;
        }

        $this->assertTrue(\is_string($passwordHash));
        $this->assertNotSame($plainText, $passwordHash);
    }

    public function testIsPasswordCorrect(): void
    {
        $passwordManager = new PasswordManager();
        $password = 'secret password';
        $fakePassword = 'fake password';
        $correctPasswordHash = '$argon2i$v=19$m=1024,t=2,p=2$andncW5jUC5ZLkZXMTJybw$OPJuhsqyTvZFkOzQUZOkh54UmEQZo2sJWvHDpflZBYI';

        $this->assertTrue($passwordManager->isPasswordCorrect($password, $correctPasswordHash));
        $this->assertFalse($passwordManager->isPasswordCorrect($fakePassword, $correctPasswordHash));
    }
}
