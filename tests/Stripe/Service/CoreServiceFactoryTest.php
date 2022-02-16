<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\CoreServiceFactory
 */
final class CoreServiceFactoryTest extends \StripePhp\TestCase
{
    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var CoreServiceFactory */
    private $serviceFactory;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->serviceFactory = new CoreServiceFactory($this->client);
    }

    public function testExposesPropertiesForServices()
    {
        static::assertInstanceOf(CouponService::class, $this->serviceFactory->coupons);
        static::assertInstanceOf(\StripePhp\Service\Issuing\IssuingServiceFactory::class, $this->serviceFactory->issuing);
    }

    public function testMultipleCallsReturnSameInstance()
    {
        $service = $this->serviceFactory->coupons;
        static::assertSame($service, $this->serviceFactory->coupons);
    }
}
