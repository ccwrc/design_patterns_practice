<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * @link https://www.php.net/manual/en/language.oop5.magic.php offical.
 * @link https://www.tutorialdocs.com/article/16-php-magic-methods.html unoffical.
 */
class MagicMethod
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

    /**
     * @link https://sekurak.pl/php-object-injection-malo-znana-krytyczna-klasa-podatnosci/ How to avoid problems.
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @link https://www.owasp.org/index.php/PHP_Object_Injection How to avoid problems.
     */
    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @link https://www.owasp.org/index.php/PHP_Object_Injection How to avoid problems.
     */
    public function __destruct()
    {
        echo 'I\'m going to heaven.';
    }
}
