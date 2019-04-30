<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Visitor;

use Patterns\Visitor\PatternInterface\VisitorInterface;
use Patterns\Visitor\{Russia, Ukraine};

use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    /**
     * @return VisitorInterface
     */
    public function testCreateVisitor(): VisitorInterface
    {
        $visitor = new Russia();

        $this->assertInstanceOf(VisitorInterface::class, $visitor);

        return $visitor;
    }

    /**
     * @depends testCreateVisitor
     * @param VisitorInterface $visitor
     */
    public function testVisitUkraine(VisitorInterface $visitor): void
    {
        $ukraine = new Ukraine(99);
        $ukraine->accept($visitor);

        $this->assertSame(98, $ukraine->getTotalArea());
    }

}
