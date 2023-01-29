<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class OtherCatFactory
{
    public function createCat(bool $isFluffy, bool $isAnnoying): Cat
    {
        return new Cat($isFluffy, $isAnnoying);
    }

    public function createFluffyCat(bool $isAnnoying): Cat
    {
        return new Cat(true, $isAnnoying);
    }
}
