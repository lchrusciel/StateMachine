<?php

declare(strict_types=1);

namespace App\Model;

final class Payment
{
    private string $state = 'new';

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
}
