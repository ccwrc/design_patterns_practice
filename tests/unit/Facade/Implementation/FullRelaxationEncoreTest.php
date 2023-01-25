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
        $fullRelaxationEncore = new FullRelaxationEncore();
        $this->assertFalse($fullRelaxationEncore->hasItHappened());

        $fullRelaxationEncore->makeItHappen(20);
        $this->assertTrue($fullRelaxationEncore->hasItHappened());
    }
}
