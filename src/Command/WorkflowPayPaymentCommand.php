<?php

declare(strict_types=1);

namespace App\Command;

use App\Model\Payment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Workflow\Registry;

class WorkflowPayPaymentCommand extends Command
{
    protected static $defaultName = 'app:pay-with-workflow';
    private Registry $workflows;
    private TokenStorageInterface $storage;

    public function __construct(Registry $workflows, TokenStorageInterface $storage)
    {
        parent::__construct();

        $this->workflows = $workflows;
        $this->storage = $storage;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $this->storage->setToken(new AnonymousToken('elo', new User('annon', 'annon')));

        $payment = new Payment();

        $stateMachine = $this->workflows->get($payment, 'payment');
        $stateMachine->apply($payment, 'process');
        $stateMachine->apply($payment, 'pay');

        var_dump($payment);

        $payment = new Payment();

        $stateMachine = $this->workflows->get($payment, 'payment');
        $stateMachine->apply($payment, 'process');
        $stateMachine->apply($payment, 'block');

        var_dump($payment);

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
