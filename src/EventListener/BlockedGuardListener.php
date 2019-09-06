<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\Workflow\Event\GuardEvent;

final class BlockedGuardListener
{
    public function __invoke(GuardEvent $event): void
    {
        $event->setBlocked(true);
    }
}
