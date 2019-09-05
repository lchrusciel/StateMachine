<?php

namespace App\Command;

use App\Model\Payment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Workflow\Registry;

class PayPaymentCommand extends Command
{
    protected static $defaultName = 'app:pay-payment';
    /** @var Registry */
    private $workflows;

    public function __construct(Registry $workflows)
    {
        parent::__construct();

        $this->workflows = $workflows;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $payment = new Payment();

        $stateMachine = $this->workflows->get($payment, 'payment');
        $stateMachine->apply($payment, 'process');

        $payment->setState('yolo');

        var_dump($payment);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
