<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletInterface;
use Mopsic\MinerApi\Contract\Api\WalletApiInterface;
use Mopsic\MinerApi\Contract\Client\HttpClientInterface;
use GuzzleHttp\Psr7\Request;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Model\Wallet;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client implements WalletApiInterface
{
    const NAME = 'ethplorer';

    const FREE_API_KEY = 'freekey';

    /**
     * @var string
     */
    protected $baseUrl = 'https://api.ethplorer.io/';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * EthplorerApiClient constructor.
     * @param HttpClientInterface $client
     * @param string $apiKey
     */
    public function __construct(HttpClientInterface $client, string $apiKey = self::FREE_API_KEY)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**§
     * @param string $address
     * @return WalletInterface
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getWallet(string $address): WalletInterface
    {
        $response = $this->client->makeRequest($this->createRequest($address));
        $data = json_decode($response->getBody()->getContents(), true);

        if (json_last_error()) {
            throw new ApiResponseException(json_last_error_msg());
        }

        return $this->transform($data, $address);
    }

    /**
     * @param array $data
     * @param string $address
     * @return WalletInterface
     */
    private function transform(array $data, string $address): WalletInterface
    {
        return (new Wallet())
            ->setAddress($address)
            ->setBalance($data['ETH']['balance'])
        ;
    }

    /**
     * @param string $address
     * @return Request
     */
    private function createRequest(string $address): Request
    {
        return (new Request('GET',$this->baseUrl.sprintf('getAddressInfo/%s?apiKey=%s', $address, $this->apiKey)));
    }
}
