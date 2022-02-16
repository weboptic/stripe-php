<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Token
 */
final class TokenTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'tok_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tokens/' . self::TEST_RESOURCE_ID
        );
        $resource = Token::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Token::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tokens'
        );
        $resource = Token::create(['card' => 'tok_visa']);
        static::assertInstanceOf(\StripePhp\Token::class, $resource);
    }
}
