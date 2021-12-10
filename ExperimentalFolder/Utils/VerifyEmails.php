<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Utils;

class VerifyEmails
{
    /**
     * Returns only valid email addresses.
     *
     * @param string[] $array
     *
     * @return string[]
     */
    public static function verify(array $array): array
    {
        $verifiedEmails = [];

        foreach ($array as $probablyEmail) {
            if (\filter_var($probablyEmail, FILTER_VALIDATE_EMAIL)) {
                $verifiedEmails[] = $probablyEmail;
            }
        }

        return $verifiedEmails;
    }
}
