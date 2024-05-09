<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php83features;

use Patterns\ExperimentalFolder\Php83features\JsonValidate;
use PHPUnit\Framework\TestCase;

class JsonValidateTest extends TestCase
{
    public function testValidJson(): void
    {
        $object = new JsonValidate();

        $this->assertTrue($object->isCorrectJson(JsonValidate::VALID_JSON));
    }

    public function testInvalidJson(): void
    {
        $object = new JsonValidate();

        $this->assertFalse($object->isCorrectJson(JsonValidate::INVALID_JSON));
    }
}
