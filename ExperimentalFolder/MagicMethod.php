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

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
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
        // worse way: trigger_error('message', E_USER_NOTICE);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @throws \Exception
     */
    public function __set(string $name, $value)
    {
        throw new \Exception('No access to property or property does not exist.');
        // or logic: check name, check and filter value, fun with reflection, etc.
    }
}
