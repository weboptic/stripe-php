<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\ApplicationFeeRefund
 */
final class ApplicationFeeRefundTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'fr_123';
    const TEST_FEE_ID = 'fee_123';

    public function testIsSaveable()
    {
        $resource = ApplicationFee::retrieveRefund(self::TEST_FEE_ID, self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . $resource->fee . '/refunds/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\ApplicationFeeRefund::class, $resource);
    }
}
