<?php

namespace Mopsic\MinerApi\Model;

use Mopsic\MinerApi\Contract\Api\Pool\MinerInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Miner implements MinerInterface
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var float
     */
    private $balance = 0;

    /**
     * @var Worker[]
     */
    private $workers = [];

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     *
     * @return $this
     */
    public function setBalance(float $balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return Worker[]
     */
    public function getWorkers(): array
    {
        return $this->workers;
    }

    /**
     * @param Worker[] $workers
     *
     * @return $this
     */
    public function setWorkers(array $workers)
    {
        $this->workers = $workers;

        return $this;
    }
}
