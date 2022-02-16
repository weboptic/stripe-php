<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\ExchangeRateService
 */
final class ExchangeRateServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var ExchangeRateService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ExchangeRateService($this->client);
    }

    public function testAll()
    {
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\ExchangeRate::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $resource = $this->service->retrieve('usd');
        static::assertInstanceOf(\StripePhp\ExchangeRate::class, $resource);
    }
}
