<?php

namespace Mopsic\MinerApi\Api\Pool\Ethermine;

use Mopsic\MinerApi\Contract\Api\Pool\MinerInterface;
use Mopsic\MinerApi\Contract\Api\PoolApiInterface;
use Mopsic\MinerApi\Contract\Client\HttpClientInterface;
use GuzzleHttp\Psr7\Request;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Model\Miner;
use Mopsic\MinerApi\Model\Worker;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client implements PoolApiInterface
{
    const NAME = 'ethermine';

    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $baseUrl = 'https://api.ethermine.org';

    /**
     * Client constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $address
     * @return MinerInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getMiner(string $address): MinerInterface
    {
        $request = new Request('GET', sprintf('%s/miner/%s/dashboard', $this->baseUrl, $address));
        $data = json_decode($this->client->makeRequest($request)->getBody()->getContents(), true);

        if (json_last_error() || !isset($data['status']) || $data['status'] != 'OK') {
            throw new ApiResponseException(json_last_error_msg());
        }

        return $this->transform($data, $address);
    }

    /**
     * @param array $data
     * @param string $address
     * @return Miner
     */
    private function transform(array $data, string $address): Miner
    {
        $miner = (new Miner())
            ->setBalance(round($data['data']['currentStatistics']['unpaid']/1000000000000000000, 5))
            ->setAddress($address)
            ->setPayoutAmount(round($data['data']['settings']['minPayout']/(10**18), 5))
        ;

        if (!empty($data['data']['workers'])) {
            $workers = [];
            foreach ($data['data']['workers'] as $worker) {
                array_push($workers, (new Worker())
                    ->setName($worker['worker'])
                    ->setHashRate(round($worker['currentHashrate']/1000000, 5))
                    ->setLastSeen((new \DateTime())->setTimestamp($worker['lastSeen']))
                );
            }
            $miner->setWorkers($workers);
        }

        return $miner;
    }
}
