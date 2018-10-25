<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\{Girl, GirlCaretaker, Wolf};

use PHPUnit\Framework\TestCase;

class GirlTest extends TestCase
{
    public function testCreate(): Girl
    {
        $girl = new Girl('Mathilda');

        $this->assertInstanceOf(Girl::class, $girl);
        $this->assertTrue($girl->isGrandmaLives());

        return $girl;
    }

    /**
     * @depends testCreate
     * @param Girl $girl
     */
    public function testBehatNeeded(Girl $girl): void
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
