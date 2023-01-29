<?php

declare(strict_types=1);

namespace Patterns\NullObject;

interface MailerStrategy
{
    /**
     * No return type: each implementation can return its own.
     *
     * @param string $mailAddress
     *
     * @return mixed
     */
    public function sendMail(string $mailAddress);
}
