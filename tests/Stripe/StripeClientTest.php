<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\StripeClient
 */
final class StripeClientTest extends \StripePhp\TestCase
{
    public function testExposesPropertiesForServices()
    {
        $client = new StripeClient('sk_test_123');
        static::assertInstanceOf(\StripePhp\Service\CouponService::class, $client->coupons);
        static::assertInstanceOf(\StripePhp\Service\Issuing\IssuingServiceFactory::class, $client->issuing);
        static::assertInstanceOf(\StripePhp\Service\Issuing\CardService::class, $client->issuing->cards);
    }
}
