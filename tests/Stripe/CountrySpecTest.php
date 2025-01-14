<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\CountrySpec
 */
final class CountrySpecTest extends \StripePhp\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'US';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs'
        );
        $resources = CountrySpec::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\CountrySpec::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs/' . self::TEST_RESOURCE_ID
        );
        $resource = CountrySpec::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\CountrySpec::class, $resource);
    }
}
