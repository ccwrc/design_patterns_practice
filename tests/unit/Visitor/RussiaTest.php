<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Visitor;

use Patterns\Visitor\PatternInterface\VisitorInterface;
use Patterns\Visitor\{Poland, Russia, Ukraine};

use PHPUnit\Framework\TestCase;

class RussiaTest extends TestCase
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

    /**
     * @depends testCreateVisitor
     * @param VisitorInterface $visitor
     */
    public function testVisitPoland(VisitorInterface $visitor): void
    {
        $poland = new Poland(99);
        $poland->accept($visitor);

        $this->assertSame(0, $poland->getTotalArea());
    }
}
