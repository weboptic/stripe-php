<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Product
 */
final class ProductTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'prod_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/products'
        );
        $resources = Product::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Product::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Product::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/products'
        );
        $resource = Product::create([
            'name' => 'name',
        ]);
        static::assertInstanceOf(\StripePhp\Product::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/products/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Product::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource = Product::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Product::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/products/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\StripePhp\Product::class, $resource);
    }
}
