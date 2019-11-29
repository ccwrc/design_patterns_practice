<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/typed_properties_v2 docs
 */
final class TypedPropertiesTwoZero
{
    public ?int $int;

    public string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }
}
