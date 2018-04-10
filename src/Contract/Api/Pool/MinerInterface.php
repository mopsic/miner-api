<?php

namespace Mopsic\MinerApi\Contract\Api\Pool;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface MinerInterface
{
    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @return float
     */
    public function getBalance(): float;

    /**
     * @return WorkerInterface[]|array
     */
    public function getWorkers(): array;
}
