<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Coupon
 */
final class CouponTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = '25OFF';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons'
        );
        $resources = Coupon::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Coupon::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = Coupon::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Coupon::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons'
        );
        $resource = Coupon::create([
            'percent_off' => 25,
            'duration' => 'repeating',
            'duration_in_months' => 3,
            'id' => self::TEST_RESOURCE_ID,
        ]);
        static::assertInstanceOf(\StripePhp\Coupon::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Coupon::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Coupon::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = Coupon::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Coupon::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Coupon::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\StripePhp\Coupon::class, $resource);
    }
}
