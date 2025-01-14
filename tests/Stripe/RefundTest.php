<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Refund
 */
final class RefundTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 're_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds'
        );
        $resources = Refund::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Refund::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = Refund::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Refund::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds'
        );
        $resource = Refund::create([
            'charge' => 'ch_123',
        ]);
        static::assertInstanceOf(\StripePhp\Refund::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Refund::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/refunds/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Refund::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = Refund::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Refund::class, $resource);
    }
}
