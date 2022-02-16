<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Event
 */
final class EventTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'evt_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/events'
        );
        $resources = Event::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Event::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/events/' . self::TEST_RESOURCE_ID
        );
        $resource = Event::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Event::class, $resource);
    }
}
