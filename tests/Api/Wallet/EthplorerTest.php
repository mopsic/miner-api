<?php

namespace Mopsic\MinerApi\Tests\Api\Wallet;

use Mopsic\MinerApi\Api\Wallet\Ethplorer\Client;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Tests\Api\ApiTestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class EthplorerTest extends ApiTestCase
{
    public function testGetWallet()
    {
        $fakeHttpClient = $this->createClient('
        {
    "address": "",
    "ETH": {
        "balance": "100.999",
        "totalIn": "",
        "totalOut": ""
    },
    "contractInfo": {
       "creatorAddress": "",
       "transactionHash": "",
       "timestamp":  ""
    },
    "tokenInfo": "",
    "tokens": [
        {
            "tokenInfo": "",
            "balance": "",
            "totalIn": "",
            "totalOut": ""
        }
    ],
    "countTxs": ""
}
        ');

        $client = new Client($fakeHttpClient);
        $wallet = $client->getWallet('0x1234567891012121346');

        $this->assertEquals('0x1234567891012121346', $wallet->getAddress());
        $this->assertEquals(100.999, $wallet->getBalance());
    }

    public function testApiResponseException()
    {
        $fakeHttpClient = $this->createClient('');
        $client = new Client($fakeHttpClient);
        $this->setExpectedException(ApiResponseException::class);

        $client->getWallet('0x1234567891012121346');
    }
}
