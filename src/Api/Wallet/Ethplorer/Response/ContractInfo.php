<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer\Response;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class ContractInfo
{
    /**
     * @var string
     */
    private $creatorAddress;

    /**
     * @var string
     */
    private $transactionHash;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @return string
     */
    public function getCreatorAddress(): string
    {
        return $this->creatorAddress;
    }

    /**
     * @param string $creatorAddress
     *
     * @return $this
     */
    public function setCreatorAddress(string $creatorAddress)
    {
        $this->creatorAddress = $creatorAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

    /**
     * @param string $transactionHash
     *
     * @return $this
     */
    public function setTransactionHash(string $transactionHash)
    {
        $this->transactionHash = $transactionHash;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     *
     * @return $this
     */
    public function setTimestamp(int $timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }
}
