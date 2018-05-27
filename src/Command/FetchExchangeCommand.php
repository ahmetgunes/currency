<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:49 PM
 */

namespace App\Command;


use App\Model\Operator\OperatorFactory;
use App\Model\Provider\ProviderFactory;
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
        $providerParameters = $this->getContainer()->getParameter('providers');
        $providers = [];
        foreach ($providerParameters as $parameter) {
            $providers[] = ProviderFactory::create($parameter);
        }

        $operator = OperatorFactory::create($this->getContainer(), $providers);
        $operator->operate();
    }
}
