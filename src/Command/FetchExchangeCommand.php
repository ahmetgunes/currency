<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:49 PM
 */

namespace App\Command;


use App\Model\Operator\ExchangeOperator;
use App\Model\Provider\FirstProvider;
use App\Model\Provider\SecondProvider;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchExchangeCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'fetch:exchange';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $om = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        $logger = $this->getContainer()->get('logger');
        $operator = new ExchangeOperator($om, $logger);

        $providers = [
            new FirstProvider(),
            new SecondProvider()
        ];

        foreach ($providers as $provider) {
            $operator->fetch($provider);
        }
    }
}
