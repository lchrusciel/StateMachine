<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Message\InformAboutPaidPayment;
use App\Model\Payment;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\Event\EnterEvent;

final class PaymentPaidListener
{
    public function __invoke(EnterEvent $event): void
    {
        $payment = $event->getSubject();
        var_dump('Dispatched on transition');
        var_dump($payment);
    }
}
