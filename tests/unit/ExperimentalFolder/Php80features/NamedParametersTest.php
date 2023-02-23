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

        $result1 = NamedParameters::willYouGoToHeaven($bool, $array);
        $result2 = NamedParameters::willYouGoToHeaven(goodDeeds: $array, areYouDead: $bool);

        $this->assertSame($result1, $result2);
    }
}
