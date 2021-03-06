<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Message\InformAboutPaidPayment;
use App\Model\Payment;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\Event\EnteredEvent;
use Symfony\Component\Workflow\Event\EnterEvent;

final class AfterPaymentPaidListener
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(EnteredEvent $event): void
    {
        /** @var Payment $payment */
        $payment = $event->getSubject();

        $this->bus->dispatch(new InformAboutPaidPayment());
    }
}
