<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php80features;

use Patterns\ExperimentalFolder\Php80features\NamedParameters;
use PHPUnit\Framework\TestCase;

class NamedParametersTest extends TestCase
{
    public function testWillYouGoToHeaven(): void
    {
        $bool = true;
        $array = [
            'I saved the cat',
            'I don\'t program in Java for evil corporations.'
        ];
        $string = 'This is second default value. Where is first?';

        $result1 = NamedParameters::willYouGoToHeaven($bool, $array);
        $result2 = NamedParameters::willYouGoToHeaven($bool, defaultValue2: $string, goodDeeds: $array);

        $this->assertSame($result1, $result2);
    }
}
