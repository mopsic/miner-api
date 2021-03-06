<?php

namespace Mopsic\MinerApi\Api\Wallet\Etherscan;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletInterface;
use Mopsic\MinerApi\Contract\Api\Wallet\WalletTransactionInterface;
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
    const NAME = 'etherscan';

    const URL_BALANCE = '/api?module=account&action=balance&address=%s&tag=latest&apikey=%s';

    /**
     * @var string
     */
    protected $baseUrl = 'https://api.etherscan.io';

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
    public function __construct(HttpClientInterface $client, string $apiKey)
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
            ->setBalance(round($data['result']/(10**18), 5))
        ;
    }

    /**
     * @param string $address
     * @return Request
     */
    private function createRequest(string $address): Request
    {
        return (new Request('GET',$this->baseUrl.sprintf(self::URL_BALANCE, $address, $this->apiKey)));
    }

    /**
     * @param string $address
     * @param array|null $options
     * @return array|WalletTransactionInterface[]|null
     */
    public function getTransactions(string $address, ?array $options = []): ?array
    {
        // TODO: Implement getTransactions() method.
    }
}
