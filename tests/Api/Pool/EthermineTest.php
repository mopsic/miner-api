<?php

namespace Mopsic\MinerApi\Tests\Api\Pool;

use Mopsic\MinerApi\Api\Pool\Ethermine\Client;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Tests\Api\ApiTestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class EthermineTest extends ApiTestCase
{
    public function testGetMiner()
    {
        $fakeHttpClient = $this->createClient('
        {
    "status": "OK",
    "data": {
        "statistics": [
            {
                "time": 1523380200,
                "reportedHashrate": 61761169,
                "currentHashrate": 60666666.666666664,
                "validShares": 52,
                "invalidShares": 0,
                "staleShares": 4,
                "activeWorkers": 1
            }
        ],
        "workers": [
            {
                "worker": "rig0",
                "time": 1523466000,
                "lastSeen": 1523465948,
                "reportedHashrate": 61759801,
                "currentHashrate": 69555555.55555555,
                "validShares": 60,
                "invalidShares": 0,
                "staleShares": 4
            }
        ],
        "currentStatistics": {
            "time": 1523466000,
            "lastSeen": 1523465948,
            "reportedHashrate": 61759801,
            "currentHashrate": 69555555.55555555,
            "validShares": 60,
            "invalidShares": 0,
            "staleShares": 4,
            "activeWorkers": 1,
            "unpaid": 12582701596325340
        },
        "settings": {
            "email": "",
            "monitor": 0,
            "minPayout": 50000000000000000
        }
    }
}
        ');

        $client = new Client($fakeHttpClient);
        $miner = $client->getMiner('0x1234567891012121346');

        $this->assertEquals(1, count($miner->getWorkers()));
        $this->assertEquals('0x1234567891012121346', $miner->getAddress());
        $this->assertEquals(0.01258, $miner->getBalance());
        $this->assertEquals(0.05, $miner->getPayoutAmount());
        $this->assertEquals('rig0', $miner->getWorkers()[0]->getName());
        $this->assertEquals(69.55556, $miner->getWorkers()[0]->getHashRate());
        $this->assertEquals(new \DateTime('2018-04-11T19:59:08.000000+0300'), $miner->getWorkers()[0]->getLastSeen());
    }

    public function testNotOkResponse()
    {
        $fakeHttpClient = $this->createClient('{"status": "FALSE"}');

        $client = new Client($fakeHttpClient);
        $this->setExpectedException(ApiResponseException::class);

        $client->getMiner('0x1234567891012121346');
    }

    public function testNotOkResponse2()
    {
        $fakeHttpClient = $this->createClient('{"data": "OK"}');

        $client = new Client($fakeHttpClient);
        $this->setExpectedException(ApiResponseException::class);

        $client->getMiner('0x1234567891012121346');
    }

    public function testApiResponseException()
    {
        $fakeHttpClient = $this->createClient('');
        $client = new Client($fakeHttpClient);
        $this->setExpectedException(ApiResponseException::class);

        $client->getMiner('0x1234567891012121346');
    }
}
