<?php

namespace Mopsic\MinerApi\Model;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Wallet implements WalletInterface
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
}
