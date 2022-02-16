<?php

namespace StripePhp\Service\Identity;

/**
 * @internal
 * @covers \StripePhp\Service\Identity\VerificationReportService
 */
final class VerificationReportServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'vr_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var VerificationReportService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new VerificationReportService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Identity\VerificationReport::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Identity\VerificationReport::class, $resource);
    }
}
