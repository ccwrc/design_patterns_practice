<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class CatFactory
{
    /**
     * @param bool $isFluffy
     * @param bool $isAnnoying
     *
     * @return Cat
     */
    public static function createCat(bool $isFluffy, bool $isAnnoying): Cat
    {
        return new Cat($isFluffy, $isAnnoying);
    }

    /**
     * @param bool $isAnnoying
     *
     * @return Cat
     */
    public static function createFluffyCat(bool $isAnnoying): Cat
    {
        return new Cat(true, $isAnnoying);
    }
}
