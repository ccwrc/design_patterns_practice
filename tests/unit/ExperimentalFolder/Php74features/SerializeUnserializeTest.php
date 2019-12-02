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

        $afterSerializedName = SerializeUnserialize::WARNING_MESSAGE . $originalName;
        $afterSerializedIsZombie = true;

        $serializedObject = \serialize($originalObject);

        /** @var SerializeUnserialize $unserializedObject */
        $unserializedObject = \unserialize($serializedObject);

        $this->assertInstanceOf(SerializeUnserialize::class, $unserializedObject);
        $this->assertEquals($afterSerializedName, $unserializedObject->getName());
        $this->assertEquals($afterSerializedIsZombie, $unserializedObject->isZombie);
    }
}
