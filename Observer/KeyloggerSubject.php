<?php

declare(strict_types=1);

namespace Patterns\Observer;

interface KeyloggerSubject extends \SplSubject
{
    public function getPlainTextPassword(): string;
}
