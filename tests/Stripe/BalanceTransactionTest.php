<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\BalanceTransaction
 */
final class BalanceTransactionTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'txn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions'
        );
        $resources = BalanceTransaction::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\BalanceTransaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = BalanceTransaction::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\BalanceTransaction::class, $resource);
    }
}
