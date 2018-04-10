<?php

namespace Mopsic\MinerApi\Contract\Api\Coin;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface CoinInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getSymbol(): string;

    /**
     * @return float
     */
    public function getPrice(): float ;

    /**
     * @return int
     */
    public function getRank(): int;
}
