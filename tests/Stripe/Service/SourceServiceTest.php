<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\SourceService
 */
final class SourceServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'src_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var SourceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SourceService($this->client);
    }

    public function testAllTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/source_transactions'
        );
        $resources = $this->service->allTransactions(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\SourceTransaction::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources'
        );
        $resource = $this->service->create([
            'type' => 'card',
        ]);
        static::assertInstanceOf(\StripePhp\Source::class, $resource);
    }

    public function testDetach()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/cus_123/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->detach('cus_123', self::TEST_RESOURCE_ID);
        //static::assertInstanceOf(\StripePhp\Source::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Source::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Source::class, $resource);
    }

    public function testVerify()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/verify'
        );
        $resource = $this->service->verify(self::TEST_RESOURCE_ID, ['values' => [32, 45]]);
        static::assertInstanceOf(\StripePhp\Source::class, $resource);
    }
}
