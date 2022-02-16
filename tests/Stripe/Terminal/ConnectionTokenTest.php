<?php

namespace StripePhp\Terminal;

/**
 * @internal
 * @covers \StripePhp\Terminal\ConnectionToken
 */
final class ConnectionTokenTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = ConnectionToken::create();
        static::assertInstanceOf(\StripePhp\Terminal\ConnectionToken::class, $resource);
    }
}
