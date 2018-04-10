<?php

namespace Mopsic\MinerApi\Contract\Api\Wallet;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface WalletInterface
{
    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @return float
     */
    public function getBalance(): float;
}
