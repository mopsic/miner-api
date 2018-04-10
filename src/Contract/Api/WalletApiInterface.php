<?php

namespace Mopsic\MinerApi\Contract\Api;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletInterface;
use Mopsic\MinerApi\Contract\ApiInterface;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface WalletApiInterface extends ApiInterface
{
    /**
     * @param string $address
     * @return WalletInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getWallet(string $address): WalletInterface;
}
