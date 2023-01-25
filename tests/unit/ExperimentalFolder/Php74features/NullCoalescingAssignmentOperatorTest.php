<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\NullCoalescingAssignmentOperator;
use PHPUnit\Framework\TestCase;

class NullCoalescingAssignmentOperatorTest extends TestCase
{
    public function testIsOperatorWorking(): void
    {
        $emptyArray = [];
        $index = 'someIndex';
        $something = 'I used to think that my life was a tragedy, but now I realize, it\'s a comedy.';
        $anotherSomething = 'Is it just me, or is it getting crazier out there? ';

        $newArray = NullCoalescingAssignmentOperator::writeSomethingToArrayWhenIndexNotExists(
            $emptyArray,
            $index,
            $something
        );
        $this->assertEquals($something, $newArray[$index]);

        $arrayExtendsNewArray = NullCoalescingAssignmentOperator::writeSomethingToArrayWhenIndexNotExists(
            $newArray,
            $index,
            $anotherSomething
        );
        $this->assertEquals($something, $arrayExtendsNewArray[$index]);
    }
}
