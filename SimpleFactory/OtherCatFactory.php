<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class OtherCatFactory
{
    /**
     * @param bool $isFluffy
     * @param bool $isAnnoying
     *
     * @return Cat
     */
    public function createCat(bool $isFluffy, bool $isAnnoying): Cat
    {
        return new Cat($isFluffy, $isAnnoying);
    }

    /**
     * @param bool $isAnnoying
     *
     * @return Cat
     */
    public function createFluffyCat(bool $isAnnoying): Cat
    {
        return new Cat(true, $isAnnoying);
    }
}
