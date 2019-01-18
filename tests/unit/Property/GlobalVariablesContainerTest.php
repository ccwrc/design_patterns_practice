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

    /**
     * @throws \Exception
     */
    public function testGetPropertyByName(): void
    {
        GlobalVariablesContainer::addPropertyBy('best actress', 'Sasha Grey');
        $this->assertEquals('Sasha Grey', GlobalVariablesContainer::getPropertyBy('best actress'));

        $dateTimeObject = new \DateTime();
        GlobalVariablesContainer::addPropertyBy('object', $dateTimeObject);
        $this->assertInstanceOf(\DateTime::class, GlobalVariablesContainer::getPropertyBy('object'));
    }

    public function testRemovePropertyByName(): void
    {
        GlobalVariablesContainer::addPropertyBy('number', 123456);
        $this->assertEquals(123456, GlobalVariablesContainer::getPropertyBy('number'));

        GlobalVariablesContainer::removePropertyBy('number');
        $this->assertEquals(null, GlobalVariablesContainer::getPropertyBy('number'));
    }

    public function testGetPropertyKeys(): void
    {
        GlobalVariablesContainer::addPropertyBy('float', 12.345);
        for ($i=1; $i<=10; $i++) {
            GlobalVariablesContainer::addPropertyBy('any' . $i, '123');
        }
        $this->assertTrue(\strpos(GlobalVariablesContainer::getPropertyKeys(), 'float ') !== false);
    }

    /**
     * @depends testGetPropertyByName
     */
    public function testIsPropertyExist(): void
    {
        $this->assertTrue(GlobalVariablesContainer::isPropertyExist('best actress'));
        $this->assertFalse(GlobalVariablesContainer::isPropertyExist('random password string !#$^&)*(^%$#5'));
    }
}
