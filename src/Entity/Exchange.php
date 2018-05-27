<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 2:24 PM
 */

namespace App\Entity;
use App\Entity\Traits\DBTimeTrait;
use App\Entity\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Exchange
 * @package App\Entity
 * @ORM\Table(name="exchange")
 * @ORM\Entity(repositoryClass="App\Repositories\ExchangeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Exchange
{
    use IdTrait;
    use DBTimeTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="provider", type="integer", nullable=false)
     */
    protected $provider;

    /**
     * @var float
     * @ORM\Column(name="euro", type="float", nullable=false)
     */
    protected $euro;

    /**
     * @var float
     * @ORM\Column(name="dollar", type="float", nullable=false)
     */
    protected $dollar;

    /**
     * @var float
     * @ORM\Column(name="gbp", type="float", nullable=false)
     */
    protected $gbp;

    /**
     * @return int
     */
    public function getProvider(): int
    {
        return $this->provider;
    }

    /**
     * @param int $provider
     * @return Exchange
     */
    public function setProvider(int $provider): Exchange
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return float
     */
    public function getEuro(): float
    {
        return $this->euro;
    }

    /**
     * @param float $euro
     * @return Exchange
     */
    public function setEuro(float $euro): Exchange
    {
        $this->euro = $euro;
        return $this;
    }

    /**
     * @return float
     */
    public function getDollar(): float
    {
        return $this->dollar;
    }

    /**
     * @param float $dollar
     * @return Exchange
     */
    public function setDollar(float $dollar): Exchange
    {
        $this->dollar = $dollar;
        return $this;
    }

    /**
     * @return float
     */
    public function getGbp(): float
    {
        return $this->gbp;
    }

    /**
     * @param float $gbp
     * @return Exchange
     */
    public function setGbp(float $gbp): Exchange
    {
        $this->gbp = $gbp;
        return $this;
    }
}
