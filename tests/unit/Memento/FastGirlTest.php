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

        $this->assertInstanceOf(FastGirl::class, $girl);
        $this->assertTrue($girl->isGrandmaLives());

        return $girl;
    }

    /**
     * @depends testCreate
     * @param FastGirl $girl
     */
    public function testBehatNeeded(FastGirl $girl): void
    {
        $wolf = new Wolf('Zorg');
        $wolf->setDefaultWeapon('stomach');

        $caretaker = new GirlCaretaker();
        $mementoIdBeforeMurder = $caretaker->addMementoAndReturnId($girl->saveToMemento());

        $girl->killGrandma($wolf);
        $this->assertFalse($girl->isGrandmaLives());

        $girl->restoreFromMemento($caretaker->getMemento($mementoIdBeforeMurder));
        $this->assertTrue($girl->isGrandmaLives());
    }
}
