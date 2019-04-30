<?php

declare(strict_types=1);

namespace Patterns\Visitor\PatternInterface;

interface RoleVisitedInterface
{
    public function accept(VisitorInterface $visitor);
}
