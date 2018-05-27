<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:52 PM
 */

namespace App\Model\Provider;


use App\Entity\Exchange;

class FirstProvider extends JsonProvider
{
    const USD_SYMBOL = 'USDTRY';
    const EURO_SYMBOL = 'EURTRY';
    const GBP_SYMBOL = 'GBPTRY';

    protected static $identifier = 1;

    protected static $endpoint = 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0';

    public function createExchange(array $rawData): Exchange
    {
        $exchange = new Exchange();
        foreach ($rawData['result'] as $currencyData) {
            switch ($currencyData['symbol']) {
                case self::USD_SYMBOL:
                    $exchange->setDollar($currencyData['amount']);
                    break;
                case self::EURO_SYMBOL:
                    $exchange->setEuro($currencyData['amount']);
                    break;
                case self::GBP_SYMBOL:
                    $exchange->setGbp($currencyData['amount']);
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
