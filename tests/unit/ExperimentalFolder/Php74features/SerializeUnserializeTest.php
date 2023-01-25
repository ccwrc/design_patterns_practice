<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php74features;

use Patterns\ExperimentalFolder\Php74features\SerializeUnserialize;
use PHPUnit\Framework\TestCase;

class SerializeUnserializeTest extends TestCase
{
    public function testSerializeUnserialize(): void
    {
        $originalName = 'Maggie';
        $originalObject = new SerializeUnserialize($originalName);

        $afterDeserializationName = SerializeUnserialize::WARNING_MESSAGE . $originalName;
        $afterDeserializationIsZombie = true;

        $serializedObject = \serialize($originalObject);

        /** @var SerializeUnserialize $unserializedObject */
        $unserializedObject = \unserialize($serializedObject);

        $this->assertInstanceOf(SerializeUnserialize::class, $unserializedObject);
        $this->assertEquals($afterDeserializationName, $unserializedObject->getName());
        $this->assertEquals($afterDeserializationIsZombie, $unserializedObject->isZombie);
    }
}
