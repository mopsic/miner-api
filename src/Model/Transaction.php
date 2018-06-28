<?php


namespace Mopsic\MinerApi\Model;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletTransactionInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Transaction implements WalletTransactionInterface
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var float
     */
    private $value;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var bool
     */
    private $success;

    /**
     * @var string
     */
    private $hash;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return $this
     */
    public function setFrom(string $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return $this
     */
    public function setTo(string $to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue(float $value)
    {
        $this->value = $value;

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

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     *
     * @return $this
     */
    public function setSuccess(bool $success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return $this
     */
    public function setHash(string $hash)
    {
        $this->hash = $hash;

        return $this;
    }
}
