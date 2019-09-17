<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * @link https://www.php.net/manual/en/language.oop5.magic.php offical docs.
 * @link https://www.tutorialdocs.com/article/16-php-magic-methods.html unoffical docs.
 *
 * Function __autoload() has been DEPRECATED as of PHP 7.2.0. Use instead PSR-4 standard.
 * @link https://www.php-fig.org/psr/psr-4/ PSR-4.
 */
final class MagicMethod
{
    public const NAME_AFTER_DESERIALIZATION = 'new';
    public const INVOKE_MESSAGE = 'I am not a function, I am a class!';
    public const DESTRUCT_MESSAGE = 'I\'m going to heaven.';
    public const SET_STATE_MESSAGE = 'Is it working?';
    public const VAR_DUMP_MESSAGE = 'I\'m a dump';

    /**
     * @var int
     */
    private static $cloneCounter = 1;
    /**
     * @var null | int
     */
    private $cloneNumber;
    /**
     * @var bool
     */
    private $isClone;
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
        $this->cloneNumber = null;
        $this->isClone = false;
        $this->name = $name;
        $this->number = $number;
    }

    public function isClone(): bool
    {
        return $this->isClone;
    }

    public function getCloneNumber(): ?int
    {
        return $this->cloneNumber;
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
        MicroLogger::addLog(self::DESTRUCT_MESSAGE);
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
        $this->name = self::NAME_AFTER_DESERIALIZATION;
    }

    /**
     * Method is called when a script tries to call an object as a function.
     */
    public function __invoke(): string
    {
        return self::INVOKE_MESSAGE;
    }

    /**
     * When the property does not exist or is protected/private, return false.
     * @param $name
     * @return bool
     */
    public function __isset($name): bool
    {
        return false;
    }

    /**
     * When the property does not exist or is protected/private, throw Exception.
     * The exception is thrown only for testing purposes.
     * @param $name
     * @throws \Exception
     */
    public function __unset($name): void
    {
        throw new \Exception($name . 'property does not exist or is protected/private.');
    }

    /**
     * Method is run for the clone, not the original object.
     * @link https://www.youtube.com/watch?v=Sz-Abh8opLo just a movie trailer.
     */
    public function __clone()
    {
        $this->isClone = true;
        $this->cloneNumber = static::$cloneCounter;
        static::$cloneCounter++;
    }

    /**
     * @link https://stackoverflow.com/questions/46441958/what-is-the-real-purpose-of-magic-method-set-state-in-php Better
     *  than official docs.
     * @link http://docs.php.net/manual/pl/function.var-export.php var_export() docs
     * @param array $array
     * @return string
     */
    public static function __set_state(array $array): string
    {
        return self::SET_STATE_MESSAGE;
    }

    /**
     * Called by var_dump() or print_r().
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            self::VAR_DUMP_MESSAGE => self::VAR_DUMP_MESSAGE
        ];
    }
}
