<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * @link https://www.php.net/manual/en/language.oop5.magic.php offical docs.
 * @link https://www.tutorialdocs.com/article/16-php-magic-methods.html unoffical docs.
 */
final class MagicMethod
{
    public const UNSERIALIZABLE_NAME = 'new';
    public const INVOKE_MESSAGE = 'I am not a function, I am a class!';

    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $number;

    /**
     * MagicMethod constructor.
     * @link https://kursphp.com/programowanie-obiektowe-php/konstruktor/ Multiple constructor & copy constructor.
     * @param string $name
     * @param int $number
     */
    public function __construct(string $name, int $number)
    {
        $this->name = $name;
        $this->number = $number;
    }

    /**
     * Method used to test magic method '__get'
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Method used to test magic methods '__sleep' & '__wakeup'
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @param mixed[] $arguments
     * @throws \Exception
     */
    public function __call(string $name, array $arguments)
    {
        throw new \Exception('Method does not exist.');
    }

    /**
     * @param string $name
     * @param mixed[] $arguments
     * @throws \Exception
     */
    public static function __callStatic(string $name, array $arguments)
    {
        throw new \Exception('Static method does not exist.');
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
     * No returned value.
     */
    public function __destruct()
    {
        MicroLogger::addLog('I\'m going to heaven.');
        MicroLogger::addLog(__CLASS__ . ' ' . $this->name);
    }

    /**
     * Warning: magic is slower (than getters/setters)
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function __get(string $name)
    {
        $methodName = "get{$name}";
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        }

        throw new \Exception('No access to property or property does not exist.');
        // (note) worse way: trigger_error('message', E_USER_NOTICE);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws \Exception
     */
    public function __set(string $name, $value): void
    {
        throw new \Exception('No access to property or property does not exist.');
        // (note) or logic: check name, check and filter value, fun with reflection, etc.
    }

    /**
     * @link https://www.php.net/manual/en/language.oop5.magic.php#object.sleep docs.
     */
    public function __sleep(): array
    {
        return ['number'];
    }

    /**
     * @link https://www.owasp.org/index.php/PHP_Object_Injection How to avoid problems.
     */
    public function __wakeup(): void
    {
        $this->name = self::UNSERIALIZABLE_NAME;
    }

    /**
     * Method is called when a script tries to call an object as a function.
     */
    public function __invoke(): string
    {
        return self::INVOKE_MESSAGE;
    }
}
