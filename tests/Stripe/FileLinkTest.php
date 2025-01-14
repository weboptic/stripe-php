<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\FileLink
 */
final class FileLinkTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'link_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links'
        );
        $resources = FileLink::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = FileLink::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links'
        );
        $resource = FileLink::create([
            'file' => 'file_123',
        ]);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = FileLink::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = FileLink::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }
}
