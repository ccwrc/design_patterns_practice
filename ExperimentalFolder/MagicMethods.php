<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * @link https://www.php.net/manual/en/language.oop5.magic.php offical.
 * @link https://www.tutorialdocs.com/article/16-php-magic-methods.html unoffical.
 */
class MagicMethods
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $number;

    public function __construct(string $name, int $number)
    {
        $this->name = $name;
        $this->number = $number;
    }

}
