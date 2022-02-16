<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Mandate
 */
final class MandateTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'mandate_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/mandates/' . self::TEST_RESOURCE_ID
        );
        $resource = Mandate::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Mandate::class, $resource);
    }
}
