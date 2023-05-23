<?php

declare(strict_types=1);

namespace Patterns\NullObject;

interface MailerStrategy
{
    /**
     * No return type: each implementation can return its own.
     *
     * @return mixed|void
     */
    public function sendMail(string $mailAddress);
}
