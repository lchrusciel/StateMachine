<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\Workflow\Event\EnterEvent;

final class PaymentPaidListener
{
    public function __invoke(EnterEvent $event): void
    {
        var_dump($event->getSubject());
    }
}
