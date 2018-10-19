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
        $passwordHash = $passwordManager->createPasswordHash($plainText);

        $this->assertTrue(is_string($passwordHash));
        $this->assertNotSame($plainText, $passwordHash);
    }
}
