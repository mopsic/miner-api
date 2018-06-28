<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer;

use Mopsic\MinerApi\Contract\Api\Wallet\WalletInterface;
use Mopsic\MinerApi\Contract\Api\Wallet\WalletTransactionInterface;
use Mopsic\MinerApi\Contract\Api\WalletApiInterface;
use Mopsic\MinerApi\Contract\Client\HttpClientInterface;
use GuzzleHttp\Psr7\Request;
use Mopsic\MinerApi\Exception\ApiNetworkException;
use Mopsic\MinerApi\Exception\ApiResponseException;
use Mopsic\MinerApi\Model\Transaction;
use Mopsic\MinerApi\Model\Wallet;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class Client implements WalletApiInterface
{
    const NAME = 'ethplorer';

    const FREE_API_KEY = 'freekey';

    const OPTION_LIMIT = 'limit';

    const OPTION_TIMESTAMP = 'timestamp';

    const OPTION_SHOW_ZERO_VALUES = 'showZeroValues';

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
        $response = $this->client->makeRequest($this->createAddressInfoRequest($address));
        $data = json_decode($response->getBody()->getContents(), true);

        if (json_last_error()) {
            throw new ApiResponseException(json_last_error_msg());
        }

        return $this->transform($data, $address);
    }

    /**
     * @param string $address
     * @param array|null $options
     * @return array|WalletTransactionInterface[]|null
     * @throws ApiNetworkException
     * @throws ApiResponseException
     */
    public function getTransactions(string $address, ?array $options =[]): ?array
    {
        $response = $this->client->makeRequest($this->createAddressTransactionsRequest($address, $options));
        $data = json_decode($response->getBody()->getContents(), true);

        if (json_last_error()) {
            throw new ApiResponseException(json_last_error_msg());
        }

        $return = [];

        foreach ($data as $item) {
            array_push($return, (new Transaction())
                ->setFrom($item['from'])
                ->setTo($item['to'])
                ->setValue($item['value'])
                ->setSuccess($item['success'])
                ->setTimestamp($item['timestamp'])
                ->setHash($item['hash'])
            );
        }

        return $return;
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
    private function createAddressInfoRequest(string $address): Request
    {
        return (new Request('GET',$this->baseUrl.sprintf('getAddressInfo/%s?apiKey=%s', $address, $this->apiKey)));
    }

    /**
     * @param string $address
     * @return Request
     */
    private function createAddressTransactionsRequest(string $address, ?array $options): Request
    {
        $options = array_merge(['apiKey' => $this->apiKey], $options);

        return (new Request('GET',$this->baseUrl.sprintf('getAddressTransactions/%s?%s', $address, http_build_query($options))));
    }
}
