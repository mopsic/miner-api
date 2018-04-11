<?php

namespace Mopsic\MinerApi\Tests;

use GuzzleHttp\Psr7\Response;
use Mopsic\MinerApi\Contract\Client\HttpClientInterface;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class FakeHttpClient implements HttpClientInterface
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $status;

    /**
     * @var array
     */
    private $headers;

    /**
     * FakeHttpClient constructor.
     * @param string $body
     * @param int $status
     * @param array $headers
     */
    public function __construct(string $body, $status = 200, $headers = [])
    {
        $this->body = $body;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * @param RequestInterface $request
     * @param array $options
     * @return ResponseInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function makeRequest(RequestInterface $request, array $options = []): ResponseInterface
    {
        return new Response($this->status, $this->headers, $this->body);
    }
}
