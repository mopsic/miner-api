<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer\Response;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class ETH
{
    /**
     * @var float
     */
    private $balance;

    /**
     * @var float
     */
    private $totalIn;

    /**
     * @var float
     */
    private $totalOut;

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
     * @return float
     */
    public function getTotalIn(): float
    {
        return $this->totalIn;
    }

    /**
     * @param float $totalIn
     *
     * @return $this
     */
    public function setTotalIn(float $totalIn)
    {
        $this->totalIn = $totalIn;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalOut(): float
    {
        return $this->totalOut;
    }

    /**
     * @param float $totalOut
     *
     * @return $this
     */
    public function setTotalOut(float $totalOut)
    {
        $this->totalOut = $totalOut;

        return $this;
    }
}
