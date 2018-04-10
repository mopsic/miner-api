<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer\Response;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AddressInfo
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var ETH
     */
    private $ETH;

    /**
     * @var ContractInfo
     */
    private $contractInfo;

    /**
     * @var TokenInfo
     */
    private $tokenInfo;

    /**
     * @var TokenInfo[]
     */
    private $tokens;

    /**
     * @var int
     */
    private $countTxs;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return ETH
     */
    public function getETH(): ETH
    {
        return $this->ETH;
    }

    /**
     * @param ETH $ETH
     *
     * @return $this
     */
    public function setETH(ETH $ETH)
    {
        $this->ETH = $ETH;

        return $this;
    }

    /**
     * @return ContractInfo
     */
    public function getContractInfo(): ContractInfo
    {
        return $this->contractInfo;
    }

    /**
     * @param ContractInfo $contractInfo
     *
     * @return $this
     */
    public function setContractInfo(ContractInfo $contractInfo)
    {
        $this->contractInfo = $contractInfo;

        return $this;
    }

    /**
     * @return TokenInfo
     */
    public function getTokenInfo(): TokenInfo
    {
        return $this->tokenInfo;
    }

    /**
     * @param TokenInfo $tokenInfo
     *
     * @return $this
     */
    public function setTokenInfo(TokenInfo $tokenInfo)
    {
        $this->tokenInfo = $tokenInfo;

        return $this;
    }

    /**
     * @return TokenInfo[]
     */
    public function getTokens(): array
    {
        return $this->tokens;
    }

    /**
     * @param TokenInfo[] $tokens
     *
     * @return $this
     */
    public function setTokens(array $tokens)
    {
        $this->tokens = $tokens;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountTxs(): int
    {
        return $this->countTxs;
    }

    /**
     * @param int $countTxs
     *
     * @return $this
     */
    public function setCountTxs(int $countTxs)
    {
        $this->countTxs = $countTxs;

        return $this;
    }
}
