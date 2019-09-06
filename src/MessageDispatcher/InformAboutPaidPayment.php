<?php

declare(strict_types=1);

namespace App\MessageDispatcher;

use App\Model\Payment;
use Symfony\Component\Messenger\MessageBusInterface;

final class InformAboutPaidPayment
{
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Payment $payment): void
    {
        $this->bus->dispatch(new \App\Message\InformAboutPaidPayment());
    }
}
