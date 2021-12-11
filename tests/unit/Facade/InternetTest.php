<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade;

use Patterns\Facade\Internet;

use PHPUnit\Framework\TestCase;

class InternetTest extends TestCase
{
    public function testAddLinkToPicture(): void
    {
        $validLink = 'https://images85.fotosik.pl/662/83146eae65906369.jpg';
        $internetObject = new Internet();

        $internetObject->addLinkToPicture($validLink);

        $this->assertEquals(1, $internetObject->howManyPicturesInCollection());
    }

    public function testAddInvalidLinkToPicture(): void
    {
        $invalidLink = 'https://images85.fotosik.pl/662/83146eae65906369.7jpg';
        $plainString = 'My mama says that stupid is as stupid does.';
        $internetObject = new Internet();

        $internetObject->addLinkToPicture($invalidLink);
        $internetObject->addLinkToPicture($plainString);
        $this->assertEquals(0, $internetObject->howManyPicturesInCollection());
    }
}
