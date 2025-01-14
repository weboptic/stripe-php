<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\OrderReturn
 */
final class OrderReturnTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'orret_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns'
        );
        $resources = OrderReturn::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\OrderReturn::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns/' . self::TEST_RESOURCE_ID
        );
        $resource = OrderReturn::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\OrderReturn::class, $resource);
    }
}
