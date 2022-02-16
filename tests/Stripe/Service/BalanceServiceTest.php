<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\BalanceService
 */
final class BalanceServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var BalanceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new BalanceService($this->client);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = $this->service->retrieve();
        static::assertInstanceOf(\StripePhp\Balance::class, $resource);
    }
}
