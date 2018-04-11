<?php

namespace Mopsic\MinerApi\Tests\Api\Coin;

use Mopsic\MinerApi\Api\Coin\CoinMarketCap\Client;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Tests\Api\ApiTestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class CoinMarketCapTest extends ApiTestCase
{
    public function testGetCoinByName()
    {
        $fakeHttpClient = $this->createClient('[
    {
        "id": "bitcoin",
        "name": "Bitcoin",
        "symbol": "BTC",
        "rank": "1",
        "price_usd": "573.137",
        "price_btc": "1.0",
        "24h_volume_usd": "72855700.0",
        "market_cap_usd": "9080883500.0",
        "available_supply": "15844176.0",
        "total_supply": "15844176.0",
        "max_supply": "21000000.0",
        "percent_change_1h": "0.04",
        "percent_change_24h": "-0.3",
        "percent_change_7d": "-0.57",
        "last_updated": "1472762067"
    }
]      ');
        $client = new Client($fakeHttpClient);

        $coin = $client->getCoinByName('bitcoin');

        $this->assertEquals('bitcoin', $coin->getName());
        $this->assertEquals(573.137, $coin->getPrice());
        $this->assertEquals(1, $coin->getRank());
        $this->assertEquals('BTC', $coin->getSymbol());
        $this->assertEquals('Bitcoin', $coin->getTitle());
    }

    public function testApiResponseException()
    {
        $fakeHttpClient = $this->createClient('');
        $client = new Client($fakeHttpClient);
        $this->setExpectedException(ApiResponseException::class);

        $client->getCoinByName('test');
    }
}
