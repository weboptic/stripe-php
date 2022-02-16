<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\File
 */
final class FileTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'file_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files'
        );
        $resources = File::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\File::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files/' . self::TEST_RESOURCE_ID
        );
        $resource = File::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\File::class, $resource);
    }

    public function testDeserializesFromFile()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file',
        ], null);
        static::assertInstanceOf(\StripePhp\File::class, $obj);
    }

    public function testDeserializesFromFileUpload()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file_upload',
        ], null);
        static::assertInstanceOf(\StripePhp\File::class, $obj);
    }
}
