<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\OrderReturnService
 */
final class OrderReturnServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'orret_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var OrderReturnService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new OrderReturnService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\OrderReturn::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\OrderReturn::class, $resource);
    }
}
