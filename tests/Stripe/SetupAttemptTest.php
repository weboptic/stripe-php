<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\SetupAttempt
 */
final class SetupAttemptTest extends \StripePhp\TestCase
{
    use TestHelper;

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_attempts'
        );
        $resources = SetupAttempt::all([
            'setup_intent' => 'si_123',
        ]);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\SetupAttempt::class, $resources->data[0]);
    }
}
