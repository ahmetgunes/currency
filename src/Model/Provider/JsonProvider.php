<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 1:53 PM
 */

namespace App\Model\Provider;

abstract class JsonProvider implements ProviderInterface
{
    /**
     * @var string
     */
    protected static $endpoint;

    /**
     * @return array
     *
     * Generic fetch method for fetching json data
     */
    public function fetch(): array
    {
        $data = file_get_contents(static::$endpoint);
        return json_decode($data, true);
    }
}
