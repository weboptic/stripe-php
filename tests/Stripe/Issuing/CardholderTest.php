<?php

namespace StripePhp\Issuing;

/**
 * @internal
 * @covers \StripePhp\Issuing\Cardholder
 */
final class CardholderTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'ich_123';

    public function testIsCreatable()
    {
        $params = [
            'billing' => [
                'address' => [
                    'city' => 'city',
                    'country' => 'US',
                    'line1' => 'line1',
                    'postal_code' => 'postal_code',
                ],
            ],
            'name' => 'Cardholder Name',
            'type' => 'individual',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders',
            $params
        );
        $resource = Cardholder::create($params);
        static::assertInstanceOf(\StripePhp\Issuing\Cardholder::class, $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders'
        );
        $resources = Cardholder::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Issuing\Cardholder::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID
        );
        $resource = Cardholder::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Issuing\Cardholder::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Cardholder::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Issuing\Cardholder::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Cardholder::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Issuing\Cardholder::class, $resource);
    }
}
