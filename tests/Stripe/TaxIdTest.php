<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\TaxId
 */
final class TaxIdTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_CUSTOMER_ID = 'cus_123';
    const TEST_RESOURCE_ID = 'txi_123';

    public function testHasCorrectUrl()
    {
        $resource = \StripePhp\Customer::retrieveTaxId(self::TEST_CUSTOMER_ID, self::TEST_RESOURCE_ID);
        static::assertSame(
            '/v1/customers/' . self::TEST_CUSTOMER_ID . '/tax_ids/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsDeletable()
    {
        $resource = \StripePhp\Customer::retrieveTaxId(self::TEST_CUSTOMER_ID, self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_CUSTOMER_ID . '/tax_ids/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\StripePhp\TaxId::class, $resource);
    }
}
