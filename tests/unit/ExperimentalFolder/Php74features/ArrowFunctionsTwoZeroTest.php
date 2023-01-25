<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\ArrowFunctionsTwoZero;
use PHPUnit\Framework\TestCase;

class ArrowFunctionsTwoZeroTest extends TestCase
{
    public static function getNonEmptyArray(): array
    {
        return [
            'Where pepper grows. ',
            'Where vanilla grows. ',
            'Where almonds bloom. ',
            'Where eucalyptus smells. '
        ];
    }

    public function testArrowFunctionOnArray(): void
    {
        $nonEmptyArray = ArrowFunctionsTwoZeroTest::getNonEmptyArray();

        $arrowFunctions = new ArrowFunctionsTwoZero($nonEmptyArray);
        $oldSyntaxModifiedTable = $arrowFunctions->modifyArrayOldSyntax();
        $newSyntaxModifiedTable = $arrowFunctions->modifyArrayNewSyntax();

        $this->assertEquals($oldSyntaxModifiedTable, $newSyntaxModifiedTable);
        $this->assertNotEquals($nonEmptyArray, $newSyntaxModifiedTable);
    }
}
