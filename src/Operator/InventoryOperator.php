<?php

declare(strict_types=1);

namespace App\Operator;

use App\Model\Payment;

final class InventoryOperator
{
    public function __invoke(Payment $payment): void
    {
        var_dump('Dispatched on transition');
        var_dump($payment);
    }
}
