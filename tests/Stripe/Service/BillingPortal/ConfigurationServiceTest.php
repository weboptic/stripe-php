<?php

namespace StripePhp\Service\BillingPortal;

/**
 * @internal
 * @covers \StripePhp\Service\BillingPortal\ConfigurationService
 */
final class ConfigurationServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'bpc_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var ConfigurationService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ConfigurationService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/configurations'
        );
        $resource = $this->service->create([
            'business_profile' => [
                'terms_of_service_url' => 'https://example.com/tos',
                'privacy_policy_url' => 'https://example.com/privacy',
            ],
            'features' => [
                'customer_update' => [
                    'allowed_updates' => ['address'],
                    'enabled' => true,
                ],
            ],
        ]);
        static::assertInstanceOf(\StripePhp\BillingPortal\Configuration::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/configurations/bpc_xyz'
        );
        $resource = $this->service->update('bpc_xyz', [
            'active' => false,
        ]);
        static::assertInstanceOf(\StripePhp\BillingPortal\Configuration::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/billing_portal/configurations/bpc_xyz'
        );
        $resource = $this->service->retrieve('bpc_xyz');
        static::assertInstanceOf(\StripePhp\BillingPortal\Configuration::class, $resource);
    }

    public function testList()
    {
        $this->expectsRequest(
            'get',
            '/v1/billing_portal/configurations'
        );
        $resource = $this->service->all();
        static::assertInstanceOf(\StripePhp\BillingPortal\Configuration::class, $resource->data[0]);
    }
}
