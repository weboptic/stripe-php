<?php

namespace StripePhp\Radar;

/**
 * @internal
 * @covers \StripePhp\Radar\EarlyFraudWarning
 */
final class EarlyFraudWarningTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'issfr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings'
        );
        $resources = EarlyFraudWarning::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Radar\EarlyFraudWarning::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings/' . self::TEST_RESOURCE_ID
        );
        $resource = EarlyFraudWarning::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Radar\EarlyFraudWarning::class, $resource);
    }
}
