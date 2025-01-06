<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\SensitiveParameter;
use PHPUnit\Framework\TestCase;

class SensitiveParameterTest extends TestCase
{
    public function testShamefulSecret(): void
    {
        $plainParameter = 'I\'m a dog.';
        $secretParameter = 'I married a cat.';

        $result = SensitiveParameter::shamefulSecret($plainParameter, $secretParameter);

        $this->assertContains($plainParameter, $result);
        $this->assertNotContains($secretParameter, $result);
    }
}
