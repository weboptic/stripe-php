<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\ExchangeRate
 */
final class ExchangeRateTest extends \StripePhp\TestCase
{
    use TestHelper;

    public function testIsListable()
    {
        $this->stubRequest(
            'get',
            '/v1/exchange_rates',
            [],
            null,
            false,
            [
                'object' => 'list',
                'data' => [
                    [
                        'id' => 'eur',
                        'object' => 'exchange_rate',
                        'rates' => ['usd' => 1.18221],
                    ],
                    [
                        'id' => 'usd',
                        'object' => 'exchange_rate',
                        'rates' => ['eur' => 0.845876],
                    ],
                ],
            ]
        );

        $resources = ExchangeRate::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\ExchangeRate::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->stubRequest(
            'get',
            '/v1/exchange_rates/usd',
            [],
            null,
            false,
            [
                'id' => 'usd',
                'object' => 'exchange_rate',
                'rates' => ['eur' => 0.845876],
            ]
        );
        $resource = ExchangeRate::retrieve('usd');
        static::assertInstanceOf(\StripePhp\ExchangeRate::class, $resource);
    }
}
