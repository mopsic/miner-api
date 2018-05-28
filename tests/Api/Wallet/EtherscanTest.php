<?php

namespace Mopsic\MinerApi\Tests\Api\Wallet;

use Mopsic\MinerApi\Api\Wallet\Etherscan\Client;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Tests\Api\ApiTestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class EtherscanTest extends ApiTestCase
{
    public function testGetWallet()
    {
        $fakeHttpClient = $this->createClient('{"status":"1","message":"OK","result":"416606007215041644"}');

        $client = new Client($fakeHttpClient, '');
        $wallet = $client->getWallet('0x1234567891012121346');

        $this->assertEquals('0x1234567891012121346', $wallet->getAddress());
        $this->assertEquals(0.41660600721504165, $wallet->getBalance());
    }

    public function testApiResponseException()
    {
        $fakeHttpClient = $this->createClient('');
        $client = new Client($fakeHttpClient, '');
        $this->setExpectedException(ApiResponseException::class);

        $client->getWallet('0x1234567891012121346');
    }
}
