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
        $totalArea = 99;
        $ukraine = new Ukraine($totalArea);
        $ukraine->accept($visitor);

        $this->assertSame(98, $ukraine->getTotalArea());
    }

    /**
     * @depends testCreateVisitor
     * @param VisitorInterface $visitor
     */
    public function testVisitPoland(VisitorInterface $visitor): void
    {
        $totalArea = 99;
        $poland = new Poland($totalArea);
        $poland->accept($visitor);

        $this->assertSame(0, $poland->getTotalArea());
    }
}
