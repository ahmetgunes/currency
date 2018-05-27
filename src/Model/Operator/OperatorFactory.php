<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 5:18 PM
 */

namespace App\Model\Operator;


use Symfony\Component\DependencyInjection\ContainerInterface;

class OperatorFactory
{
    /**
     * @param ContainerInterface $container
     * @param $providers
     * @return ExchangeOperator
     */
    public static function create(ContainerInterface $container, $providers): ExchangeOperator
    {
        $om = $container->get('doctrine.orm.default_entity_manager');
        $logger = $container->get('logger');
        $operator = new ExchangeOperator($om, $logger, $providers);
        return $operator;
    }
}