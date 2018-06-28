<?php


namespace Mopsic\MinerApi\Contract\Api\Wallet;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface WalletTransactionInterface
{
    /**
     * @return string
     */
    public function getFrom(): string;

    /**
     * @return string
     */
    public function getTo(): string;

    /**
     * @return float
     */
    public function getValue(): float;

    /**
     * @return int
     */
    public function getTimestamp(): int;

    /**
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * @return string
     */
    public function getHash(): string;
}
