<?php

namespace Mopsic\MinerApi\Api\Wallet\Ethplorer\Response;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class TokenInfo
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $decimals;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $totalSupply;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var int
     */
    private $lastUpdated;

    /**
     * @var float
     */
    private $totalIn;

    /**
     * @var float
     */
    private $totalOut;

    /**
     * @var int
     */
    private $issuancesCount;

    /**
     * @var int
     */
    private $holdersCount;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $price;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getDecimals(): int
    {
        return $this->decimals;
    }

    /**
     * @param int $decimals
     *
     * @return $this
     */
    public function setDecimals(int $decimals)
    {
        $this->decimals = $decimals;

        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     *
     * @return $this
     */
    public function setSymbol(string $symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * @return string
     */
    public function getTotalSupply(): string
    {
        return $this->totalSupply;
    }

    /**
     * @param string $totalSupply
     *
     * @return $this
     */
    public function setTotalSupply(string $totalSupply)
    {
        $this->totalSupply = $totalSupply;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     *
     * @return $this
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastUpdated(): int
    {
        return $this->lastUpdated;
    }

    /**
     * @param int $lastUpdated
     *
     * @return $this
     */
    public function setLastUpdated(int $lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalIn(): float
    {
        return $this->totalIn;
    }

    /**
     * @param float $totalIn
     *
     * @return $this
     */
    public function setTotalIn(float $totalIn)
    {
        $this->totalIn = $totalIn;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalOut(): float
    {
        return $this->totalOut;
    }

    /**
     * @param float $totalOut
     *
     * @return $this
     */
    public function setTotalOut(float $totalOut)
    {
        $this->totalOut = $totalOut;

        return $this;
    }

    /**
     * @return int
     */
    public function getIssuancesCount(): int
    {
        return $this->issuancesCount;
    }

    /**
     * @param int $issuancesCount
     *
     * @return $this
     */
    public function setIssuancesCount(int $issuancesCount)
    {
        $this->issuancesCount = $issuancesCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getHoldersCount(): int
    {
        return $this->holdersCount;
    }

    /**
     * @param int $holdersCount
     *
     * @return $this
     */
    public function setHoldersCount(int $holdersCount)
    {
        $this->holdersCount = $holdersCount;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return $this
     */
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPrice(): bool
    {
        return $this->price;
    }

    /**
     * @param bool $price
     *
     * @return $this
     */
    public function setPrice(bool $price)
    {
        $this->price = $price;

        return $this;
    }
}
