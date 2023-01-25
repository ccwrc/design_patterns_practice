<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\MultipleConstructor;
use PHPUnit\Framework\TestCase;

class MultipleConstructorTest extends TestCase
{
    public function testConstruct(): void
    {
        $mc = new MultipleConstructor();

        $this->assertEquals(MultipleConstructor::DEFAULT_CONTENT, $mc->getContent());
    }

    public function testOverloadArguments(): void
    {
        $mc = new MultipleConstructor('over', true, 123, 321, 'load');

        $this->assertEquals(MultipleConstructor::DEFAULT_CONTENT, $mc->getContent());
    }

    public function testConstructor1(): void
    {
        $content = 'content';
        $mc = new MultipleConstructor($content);

        $this->assertEquals($content, $mc->getContent());
    }

    public function testConstructor2(): void
    {
        $content = 'content';
        $mc = new MultipleConstructor($content, true);
        $newContent = strtoupper($content);

        $this->assertEquals($newContent, $mc->getContent());
    }

    public function testConstructor3(): void
    {
        $content = 'content';
        $marker = 123;
        $mc = new MultipleConstructor($content, true, $marker);
        $newContent = strtoupper($content . $marker);

        $this->assertEquals($newContent, $mc->getContent());
    }
}
