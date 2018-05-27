<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:06 PM
 */

namespace App\Model\Operator;


use App\Model\Provider\ProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\Log\Logger;

class ExchangeOperator
{
    /**
     * @var ObjectManager
     */
    protected $om;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * ExchangeOperator constructor.
     * @param ObjectManager $om
     * @param Logger $logger
     */
    public function __construct(ObjectManager $om, Logger $logger)
    {
        $this->om = $om;
        $this->logger = $logger;
    }

    /**
     * @param ProviderInterface $provider
     * @return bool
     * @throws \Exception
     */
    public function fetch(ProviderInterface $provider): bool
    {
        try {
            $data = $provider->fetch();
            $exchange = $provider->createExchange($data);
            $this->om->persist($exchange);
            $this->om->flush();
            return true;
        } catch (\Exception $ex) {
            $this->logger->error($ex->getMessage());
            return false;
        }
    }
}