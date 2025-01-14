<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\ApplicationFee
 */
final class ApplicationFeeTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'fee_123';
    const TEST_FEEREFUND_ID = 'fr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees'
        );
        $resources = ApplicationFee::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\ApplicationFee::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID
        );
        $resource = ApplicationFee::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\ApplicationFee::class, $resource);
    }

    public function testCanCreateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resource = ApplicationFee::createRefund(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\ApplicationFeeRefund::class, $resource);
    }

    public function testCanRetrieveRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = ApplicationFee::retrieveRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        static::assertInstanceOf(\StripePhp\ApplicationFeeRefund::class, $resource);
    }

    public function testCanUpdateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = ApplicationFee::updateRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        static::assertInstanceOf(\StripePhp\ApplicationFeeRefund::class, $resource);
    }

    public function testCanListRefunds()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resources = ApplicationFee::allRefunds(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\ApplicationFeeRefund::class, $resources->data[0]);
    }
}
