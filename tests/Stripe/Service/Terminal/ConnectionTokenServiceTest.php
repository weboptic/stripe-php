<?php

namespace StripePhp\Service\Terminal;

/**
 * @internal
 * @covers \StripePhp\Service\Terminal\ConnectionTokenService
 */
final class ConnectionTokenServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var ConnectionTokenService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ConnectionTokenService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = $this->service->create();
        static::assertInstanceOf(\StripePhp\Terminal\ConnectionToken::class, $resource);
    }
}
