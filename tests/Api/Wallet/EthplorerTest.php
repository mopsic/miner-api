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
        $fakeHttpClient = $this->createClient('{"address": "","ETH": {"balance": "100.999","totalIn": "","totalOut": ""},"contractInfo": {"creatorAddress": "","transactionHash": "","timestamp":  ""},"tokenInfo": "","tokens": [{"tokenInfo": "","balance": "","totalIn": "","totalOut": ""}],"countTxs": ""}');

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

    public function testGetTransactions()
    {
        $fakeHttpClient = $this->createClient('[{"timestamp":1530169988,"from":"0x1234567891012121346","to":"0x1234567891012121347","hash":"0xb20cd511f252e0b651828f77b3c99aa00fe3c17e8aeaa003fde82","value":0.025,"input":"0x","success":true},{"timestamp":1529894591,"from":"0x1234567891012121346","to":"0x1234567891012121346","hash":"0x90973cfca2b5432c466ef07ebdb327ba68ae536199fc943e8b1ebdf","value":0.077732935313897,"input":"0x","success":true}]');
        $client = new Client($fakeHttpClient, '');
        $transactions = $client->getTransactions('');

        $this->assertEquals(2, count($transactions));
        $this->assertEquals(1530169988, $transactions[0]->getTimestamp());
        $this->assertEquals('0x1234567891012121346', $transactions[0]->getFrom());
        $this->assertEquals('0x1234567891012121347', $transactions[0]->getTo());
        $this->assertEquals(0.025, $transactions[0]->getValue());
        $this->assertEquals(true, $transactions[0]->isSuccess());
        $this->assertEquals('0xb20cd511f252e0b651828f77b3c99aa00fe3c17e8aeaa003fde82', $transactions[0]->getHash());
    }
}
