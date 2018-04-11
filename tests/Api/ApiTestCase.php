<?php

namespace Mopsic\MinerApi\Tests\Api;

use Mopsic\MinerApi\Tests\FakeHttpClient;
use PHPUnit\Framework\TestCase;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
abstract class ApiTestCase extends TestCase
{
    /**
     * @param string $body
     * @return FakeHttpClient
     */
    protected function createClient(string $body): FakeHttpClient
    {
        return new FakeHttpClient($body);
    }
}
