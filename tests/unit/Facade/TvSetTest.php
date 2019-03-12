<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade;

use Patterns\Facade\TvSet;
use PHPUnit\Framework\TestCase;

class TvSetTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSuccessIsMaryAnObject(): void
    {
        $object = new TvSet();
        $object2 = new \DateTime();

        $this->assertTrue(TvSet::isMaryAnObject($object));
        $this->assertTrue(TvSet::isMaryAnObject($object2));
    }

    /**
     * @link https://www.youtube.com/watch?v=VY-50K33qKk Pulp Fiction, Samuel L. Jackson
     */
    public function testFailIsMaryAnObject(): void
    {
        $noObject = 'Say What Again One More Time!';

        $this->assertFalse(TvSet::isMaryAnObject($noObject));
    }
}
