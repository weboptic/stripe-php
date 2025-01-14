<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Order
 */
final class OrderTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'or_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/orders'
        );
        $resources = Order::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Order::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/orders/' . self::TEST_RESOURCE_ID
        );
        $resource = Order::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Order::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders'
        );
        $resource = Order::create([
            'currency' => 'usd',
        ]);
        static::assertInstanceOf(\StripePhp\Order::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Order::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/orders/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Order::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders/' . self::TEST_RESOURCE_ID
        );
        $resource = Order::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Order::class, $resource);
    }

    public function testIsPayable()
    {
        $resource = Order::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/orders/' . $resource->id . '/pay'
        );
        $resource->pay();
        static::assertInstanceOf(\StripePhp\Order::class, $resource);
    }

    public function testIsReturnable()
    {
        $order = Order::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/orders/' . $order->id . '/returns'
        );
        $resource = $order->returnOrder();
        static::assertInstanceOf(\StripePhp\OrderReturn::class, $resource);
    }
}
