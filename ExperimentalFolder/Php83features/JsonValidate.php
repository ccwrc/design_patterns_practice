<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php83features;

/**
 * @link https://www.php.net/manual/en/function.json-validate.php docs
 */
class JsonValidate
{
    public const string VALID_JSON = '[1, 2, 3]';
    public const string INVALID_JSON = '[a, b, c}';

    public function isCorrectJson(string $json): bool
    {
        return \json_validate($json);
    }
}
