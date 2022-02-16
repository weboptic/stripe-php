<?php

namespace StripePhp\BillingPortal;

/**
 * @internal
 * @covers \StripePhp\BillingPortal\Session
 */
final class SessionTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'pts_123';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/sessions'
        );
        $resource = Session::create([
            'customer' => 'cus_123',
            'return_url' => 'https://stripe.com/return',
        ]);
        static::assertInstanceOf(\StripePhp\BillingPortal\Session::class, $resource);
    }
}
