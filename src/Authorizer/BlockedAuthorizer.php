<?php

declare(strict_types=1);

namespace App\Authorizer;

final class BlockedAuthorizer
{
    public function __invoke(): bool
    {
        var_dump('Guarding state');
        return false;
    }
}
