<?php

namespace StripePhp\Terminal;

/**
 * @internal
 * @covers \StripePhp\Terminal\Reader
 */
final class ReaderTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'rdr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/readers'
        );
        $resources = Reader::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/readers/' . self::TEST_RESOURCE_ID
        );
        $resource = Reader::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Reader::retrieve(self::TEST_RESOURCE_ID);
        $resource->label = 'new-name';

        $this->expectsRequest(
            'post',
            '/v1/terminal/readers/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/readers/' . self::TEST_RESOURCE_ID,
            ['label' => 'new-name']
        );
        $resource = Reader::update(self::TEST_RESOURCE_ID, [
            'label' => 'new-name',
        ]);
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/readers',
            ['registration_code' => 'a-b-c']
        );
        $resource = Reader::create(['registration_code' => 'a-b-c']);
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Reader::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/terminal/readers/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\StripePhp\Terminal\Reader::class, $resource);
    }
}
