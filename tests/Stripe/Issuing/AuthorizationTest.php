<?php

namespace StripePhp\Issuing;

/**
 * @internal
 * @covers \StripePhp\Issuing\Authorization
 */
final class AuthorizationTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'iauth_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations'
        );
        $resources = Authorization::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Authorization::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resource);
    }

    public function testIsApprovable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource = $resource->approve();
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resource);
    }

    public function testIsDeclinable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/decline'
        );
        $resource = $resource->decline();
        static::assertInstanceOf(\StripePhp\Issuing\Authorization::class, $resource);
    }
}
