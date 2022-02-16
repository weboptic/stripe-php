<?php

namespace StripePhp\Exception;

/**
 * @internal
 * @covers \StripePhp\Exception\SignatureVerificationException
 */
final class SignatureVerificationExceptionTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    public function testGetters()
    {
        $e = SignatureVerificationException::factory('message', 'payload', 'sig_header');
        static::assertSame('message', $e->getMessage());
        static::assertSame('payload', $e->getHttpBody());
        static::assertSame('sig_header', $e->getSigHeader());
    }
}
