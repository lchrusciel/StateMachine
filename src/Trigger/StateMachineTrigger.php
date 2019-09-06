<?php

declare(strict_types=1);

namespace App\Trigger;

use App\Model\Payment;

final class StateMachineTrigger
{
    public function __invoke(Payment $payment): void
    {
        var_dump('Dispatched on transition');
        var_dump($payment);
    }
}
