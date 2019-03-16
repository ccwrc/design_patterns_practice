<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Facade\Implementation;

use Patterns\Facade\Implementation\FullRelaxationEncore;

use PHPUnit\Framework\TestCase;

class FullRelaxationEncoreTest extends TestCase
{
    /**
     * integration test
     */
    public function testMakeItHappen(): void
    {
        $fre = new FullRelaxationEncore();
        $this->assertFalse($fre->hasItHappened());

        $fre->makeItHappen(20);
        $this->assertTrue($fre->hasItHappened());
    }
}
