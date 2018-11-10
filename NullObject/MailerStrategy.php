<?php

declare(strict_types=1);

namespace Patterns\NullObject;

interface MailerStrategy
{
    /**
     * @param string $mailAddress
     * @return mixed
     */
    public function sendMail(string $mailAddress);
}
