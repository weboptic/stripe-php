<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\AccountLinkService
 */
final class AccountLinkServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var AccountLinkService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new AccountLinkService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/account_links'
        );
        $resource = $this->service->create([
            'account' => 'acct_123',
            'refresh_url' => 'https://stripe.com/refresh_url',
            'return_url' => 'https://stripe.com/return_url',
            'type' => 'account_onboarding',
        ]);
        static::assertInstanceOf(\StripePhp\AccountLink::class, $resource);
    }
}
