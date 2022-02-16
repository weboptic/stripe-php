<?php

namespace StripePhp\Sigma;

/**
 * @internal
 * @covers \StripePhp\Sigma\ScheduledQueryRun
 */
final class ScheduledQueryRunTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'sqr_123';

    public function testIsListable()
    {
        $resources = ScheduledQueryRun::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Sigma\ScheduledQueryRun::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $resource = ScheduledQueryRun::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Sigma\ScheduledQueryRun::class, $resource);
    }
}
