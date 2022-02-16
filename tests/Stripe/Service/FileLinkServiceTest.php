<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\FileLinkService
 */
final class FileLinkServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'link_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var FileLinkService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new FileLinkService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links'
        );
        $resource = $this->service->create([
            'file' => 'file_123',
        ]);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\FileLink::class, $resource);
    }
}
