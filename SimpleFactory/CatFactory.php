<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class CatFactory
{
    public static function createCat(bool $isFluffy, bool $isAnnoying): Cat
    {
        return new Cat($isFluffy, $isAnnoying);
    }

    public static function createFluffyCat(bool $isAnnoying): Cat
    {
        return new Cat(true, $isAnnoying);
    }
}
