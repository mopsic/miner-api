<?php

namespace Mopsic\MinerApi\Contract\Api\Pool;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface WorkerInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return float
     */
    public function getHashRate(): float;

    /**
     * @return \DateTime|null
     */
    public function getLastSeen(): ?\DateTime;
}
