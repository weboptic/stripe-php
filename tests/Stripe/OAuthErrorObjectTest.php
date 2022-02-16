<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\OAuthErrorObject
 */
final class OAuthErrorObjectTest extends \StripePhp\TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        static::assertNull($error->error);
        static::assertNull($error->error_description);
    }
}
