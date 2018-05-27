<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 5:49 PM
 */

namespace App\Model\Provider;


use App\Model\Exception\CurrencyException;

class ProviderFactory
{
    /**
     * @param array $parameters
     * @return ProviderInterface
     * @throws CurrencyException
     *
     * Creates a provider from parameters provided in services.yml
     */
    public static function create(array $parameters): ProviderInterface
    {
        if (!isset($parameters['class'])) {
            throw new CurrencyException('You must define a provider class name');
        }

        $provider = $parameters['class'];

        if (!class_exists($provider)) {
            throw new CurrencyException('Provider class does not exist');
        }

        if (!in_array(ProviderInterface::class, class_implements($provider))) {
            throw new CurrencyException('Provider must implement ' . ProviderInterface::class);
        }

        if (isset($provider['args'])) {
            //@TODO: To be used for providers with args (namely authentications)
            return new $provider();
        } else {
            return new $provider();
        }
    }
}