<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\SetupAttemptService
 */
final class SetupAttemptServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var SetupAttemptService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SetupAttemptService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_attempts'
        );
        $resources = $this->service->all([
            'setup_intent' => 'si_123',
        ]);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\SetupAttempt::class, $resources->data[0]);
    }
}
