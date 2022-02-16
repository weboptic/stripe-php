<?php

namespace StripePhp\Util;

/**
 * @internal
 * @covers \StripePhp\Util\ObjectTypes
 */
final class ObjectTypesTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    public function testMapping()
    {
        static::assertSame(\StripePhp\Util\ObjectTypes::mapping['charge'], \StripePhp\Charge::class);
        static::assertSame(\StripePhp\Util\ObjectTypes::mapping['checkout.session'], \StripePhp\Checkout\Session::class);
    }
}
