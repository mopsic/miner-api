<?php

namespace Mopsic\MinerApi\Api\Coin\CoinMarketCap;

use GuzzleHttp\Psr7\Request;
use Mopsic\MinerApi\Contract\Api\Coin\CoinInterface;
use Mopsic\MinerApi\Contract\Api\CoinApiInterface;
use Mopsic\MinerApi\Contract\Client\HttpClientInterface;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Model\Coin;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client implements CoinApiInterface
{
    const NAME = 'coinmarketcup';

    /**
     * @var string
     */
    protected $baseUrl = 'https://api.coinmarketcap.com/v1/';

    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * Client constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $name
     * @return CoinInterface
     * @throws ApiResponseException
     * @throws ApiNetworkException
     */
    public function getCoinByName(string $name): CoinInterface
    {
        $request = new Request('GET', $this->baseUrl.sprintf('ticker/%s', $name));
        $data = json_decode($this->client->makeRequest($request)->getBody()->getContents(), true);

        if (json_last_error()) {
            throw new ApiResponseException(json_last_error_msg());
        }

        return $this->transform($data[0]);
    }

    /**
     * @param array $data
     * @return Coin
     */
    private function transform(array $data): Coin
    {
        return (new Coin())
            ->setName($data['id'])
            ->setTitle($data['name'])
            ->setPrice($data['price_usd'])
            ->setRank($data['rank'])
            ->setSymbol($data['symbol'])
        ;
    }
}
