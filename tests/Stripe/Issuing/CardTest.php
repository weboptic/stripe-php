<?php

namespace StripePhp\Issuing;

/**
 * @internal
 * @covers \StripePhp\Issuing\Card
 */
final class CardTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'ic_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards'
        );
        $resources = Card::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Issuing\Card::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Issuing\Card::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Issuing\Card::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Card::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Issuing\Card::class, $resource);
    }

    public function testCanRetrieveDetails()
    {
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);

        // stripe-mock does not support this anymore so we stub it
        $this->stubRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID . '/details',
            [],
            null,
            false,
            ['object' => 'issuing.card_details']
        );

        $details = $resource->details();
        static::assertInstanceOf(\StripePhp\Issuing\CardDetails::class, $details);
    }
}
