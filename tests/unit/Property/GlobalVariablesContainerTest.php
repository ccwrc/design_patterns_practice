<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Property;

use Patterns\Property\GlobalVariablesContainer;

use PHPUnit\Framework\TestCase;

class GlobalVariablesContainerTest extends TestCase
{
    public function testGetNonExistProperty(): void
    {
        $this->assertEquals(null, GlobalVariablesContainer::getPropertyBy('NonExistProperty'));
    }

    public function testGetPropertyByName(): void
    {
        GlobalVariablesContainer::addPropertyBy('best actress', 'Sasha Grey');

        $this->assertEquals('Sasha Grey', GlobalVariablesContainer::getPropertyBy('best actress'));
    }

}
