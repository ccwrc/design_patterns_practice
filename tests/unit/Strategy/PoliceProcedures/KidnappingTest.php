<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Strategy\PoliceProcedures;

use Patterns\Strategy\PoliceProcedures\Kidnapping;

use PHPUnit\Framework\TestCase;

class KidnappingTest extends TestCase
{
    public function testChangeCode(): void
    {
        $kidnapping = new Kidnapping();
        $newCode = 'newCode';
        $kidnapping->changeCode($newCode);

        $this->assertSame($newCode, $kidnapping->getCode());
    }

    public function testAddNoteToProcedure(): void
    {
        $kidnapping = new Kidnapping();
        $newNote = 'endString';
        $kidnapping->addNoteToProcedure($newNote);

        $this->assertStringEndsWith("Note: $newNote", $kidnapping->getProcedure());
        $this->assertStringEndsWith("Note: $newNote", $kidnapping->getCodeAndProcedure());
    }
}
