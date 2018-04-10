<?php

namespace Mopsic\MinerApi\Model;

use Mopsic\MinerApi\Contract\Api\Pool\WorkerInterface;


/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Worker implements WorkerInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $hashRate = 0;

    /**
     * @var \DateTime
     */
    private $lastSeen;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getHashRate(): float
    {
        return $this->hashRate;
    }

    /**
     * @param float $hashRate
     *
     * @return $this
     */
    public function setHashRate(float $hashRate)
    {
        $this->hashRate = $hashRate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastSeen(): ?\DateTime
    {
        return $this->lastSeen;
    }

    /**
     * @param \DateTime $lastSeen
     *
     * @return $this
     */
    public function setLastSeen(\DateTime $lastSeen)
    {
        $this->lastSeen = $lastSeen;

        return $this;
    }
}
