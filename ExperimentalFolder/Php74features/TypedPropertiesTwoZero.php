<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/typed_properties_v2 docs
 * @link https://stitcher.io/blog/typed-properties-in-php-74 unoffical
 */
final class TypedPropertiesTwoZero
{
    public ?int $int;

    public int $uninitialized;

    public string $string;

    private float $float = 3.14;

    var bool $marker = false;

    public function __construct(string $string)
    {
        $this->string = $string;
    }
}
