<?php

namespace Mopsic\MinerApi\Contract\Api;

use Mopsic\MinerApi\Contract\Api\Coin\CoinInterface;
use Mopsic\MinerApi\Contract\ApiInterface;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface CoinApiInterface extends ApiInterface
{
    /**
     * @param string $name
     * @return CoinInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getCoinByName(string $name): CoinInterface;
}
