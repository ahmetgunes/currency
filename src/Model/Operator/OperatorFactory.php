<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 5:18 PM
 */

namespace App\Model\Operator;


use App\Model\Exception\CurrencyException;
use App\Model\Provider\ProviderFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OperatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return ExchangeOperator
     * @throws CurrencyException
     */
    public static function create(ContainerInterface $container): ExchangeOperator
    {
        $providerParameters = $container->getParameter('providers');
        $providers = [];
        foreach ($providerParameters as $parameter) {
            $providers[] = ProviderFactory::create($parameter);
        }

        $om = $container->get('doctrine.orm.default_entity_manager');
        $logger = $container->get('logger');
        $operator = new ExchangeOperator($om, $logger, $providers);
        return $operator;
    }
}