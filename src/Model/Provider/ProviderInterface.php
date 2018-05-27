<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 1:52 PM
 */

namespace App\Model\Provider;


use App\Entity\Exchange;

interface ProviderInterface
{
    /**
     * @return array
     *
     * Fetches, decodes and returns the raw data
     */
    public function fetch(): array;

    /**
     * @param array $rawData
     * @return Exchange
     *
     * Converts raw data into a structured exchange data
     */
    public function createExchange(array $rawData): Exchange;
}