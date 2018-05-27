<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:52 PM
 */

namespace App\Model\Provider;


use App\Entity\Exchange;

class SecondProvider extends JsonProvider
{
    const USD_SYMBOL = 'DOLAR';
    const EURO_SYMBOL = 'AVRO';
    const GBP_SYMBOL = 'İNGİLİZ STERLİNİ';

    protected static $identifier = 2;

    protected static $endpoint = 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3';

    public function createExchange(array $rawData): Exchange
    {
        $exchange = new Exchange();
        foreach ($rawData as $currencyData) {
            switch ($currencyData['kod']) {
                case self::USD_SYMBOL:
                    $exchange->setDollar($currencyData['oran']);
                    break;
                case self::EURO_SYMBOL:
                    $exchange->setEuro($currencyData['oran']);
                    break;
                case self::GBP_SYMBOL:
                    $exchange->setGbp($currencyData['oran']);
                    break;
                default:
                    //Might throw definition error on the strictness of api
                    break;
            }
        }

        $exchange->setProvider(self::$identifier);

        return $exchange;
    }
}
