<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\{FastGirl, Wolf, GirlCaretaker};

use PHPUnit\Framework\TestCase;

class FastGirlTest extends TestCase
{
    public function testCreate(): FastGirl
    {
        $girl = new FastGirl('Furious girl');
        $girl->setMaxSpeed(25);

        $this->assertInstanceOf(FastGirl::class, $girl);
        $this->assertTrue($girl->isGrandmaLives());

        return $girl;
    }

    /**
     * @depends testCreate
     * @param FastGirl $girl
     */
    public function testBehatNeededWithMaxSpeed(FastGirl $girl): void
    {
        $wolf = new Wolf('Zorg');
        $wolf->setDefaultWeapon('stomach');

        $caretaker = new GirlCaretaker();
        $mementoIdBeforeMurder = $caretaker->addMementoAndReturnId($girl->saveToMemento());

        $girl->killGrandma($wolf);
        $girl->setMaxSpeed(300);
        $this->assertFalse($girl->isGrandmaLives());
        $this->assertEquals(300, $girl->getMaxSpeed());

        $girl->restoreFromMemento($caretaker->getMemento($mementoIdBeforeMurder));
        $this->assertTrue($girl->isGrandmaLives());
        $this->assertEquals(25, $girl->getMaxSpeed());
    }
}
