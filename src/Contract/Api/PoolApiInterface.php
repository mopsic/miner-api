<?php

namespace Mopsic\MinerApi\Contract\Api;

use Mopsic\MinerApi\Contract\Api\Pool\MinerInterface;
use Mopsic\MinerApi\Contract\ApiInterface;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface PoolApiInterface extends ApiInterface
{
    /**
     * @param string $address
     * @return MinerInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getMiner(string $address): MinerInterface;
}
