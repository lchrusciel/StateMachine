<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\InformAboutPaidPayment;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class InformAboutPaidPaymentHandler implements MessageHandlerInterface
{
    public function __invoke(InformAboutPaidPayment $payment)
    {
        var_dump('Message handled');
        file_get_contents('https://workflow.free.beeceptor.com');
    }
}
