<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade;

use Patterns\Facade\TvSet;
use PHPUnit\Framework\TestCase;

class TvSetTest extends TestCase
{
    public function testSuccessIsMaryAnTvSetObject(): void
    {
        $object = new TvSet();

        $this->assertTrue(TvSet::isMaryAnTvSetObject($object));
    }

    /**
     * @link https://www.youtube.com/watch?v=VY-50K33qKk Pulp Fiction, Samuel L. Jackson
     *
     * @throws \Exception
     */
    public function testFailIsMaryAnTvSetObject(): void
    {
        $noObject = 'Say What Again One More Time!';
        $noObjectTvSet = new \DateTime();

        $this->assertFalse(TvSet::isMaryAnTvSetObject($noObject));
        $this->assertFalse(TvSet::isMaryAnTvSetObject($noObjectTvSet));
    }
}
