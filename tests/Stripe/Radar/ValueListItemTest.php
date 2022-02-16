<?php

namespace StripePhp\Radar;

/**
 * @internal
 * @covers \StripePhp\Radar\ValueListItem
 */
final class ValueListItemTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'rsli_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items'
        );
        $resources = ValueListItem::all([
            'value_list' => 'rsl_123',
        ]);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Radar\ValueListItem::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource = ValueListItem::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Radar\ValueListItem::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_list_items'
        );
        $resource = ValueListItem::create([
            'value_list' => 'rsl_123',
            'value' => 'value',
        ]);
        static::assertInstanceOf(\StripePhp\Radar\ValueListItem::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = ValueListItem::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\StripePhp\Radar\ValueListItem::class, $resource);
    }
}
