<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Balance
 */
final class BalanceTest extends \StripePhp\TestCase
{
    use TestHelper;

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = Balance::retrieve();
        static::assertInstanceOf(\StripePhp\Balance::class, $resource);
    }
}
