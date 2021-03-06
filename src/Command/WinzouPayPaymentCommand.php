<?php

declare(strict_types=1);

namespace App\Command;

use App\Model\Payment;
use SM\Factory\FactoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Workflow\Registry;

class WinzouPayPaymentCommand extends Command
{
    protected static $defaultName = 'app:pay-with-winzou';

    private FactoryInterface $factory;

    public function __construct(FactoryInterface $factory)
    {
        parent::__construct();

        $this->factory = $factory;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $payment = new Payment();

        $stateMachine = $this->factory->get($payment, 'payment');

        $stateMachine->apply('process');
        $stateMachine->apply('pay');

        var_dump($payment);

        $payment = new Payment();

        $stateMachine = $this->factory->get($payment, 'payment');

        $stateMachine->apply('process');
        $stateMachine->apply('block');

        var_dump($payment);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
