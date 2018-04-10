<?php

namespace Mopsic\MinerApi\Contract\Client;

use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface HttpClientInterface
{
    /**
     * @param RequestInterface $request
     * @param array $options
     * @return ResponseInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function makeRequest(RequestInterface $request, array $options = []): ResponseInterface;
}
