<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\InvoiceItemService
 */
final class InvoiceItemServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'ii_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var InvoiceItemService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new InvoiceItemService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoiceitems'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\InvoiceItem::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoiceitems'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'currency' => 'usd',
            'customer' => 'cus_123',
        ]);
        static::assertInstanceOf(\StripePhp\InvoiceItem::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/invoiceitems/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\InvoiceItem::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoiceitems/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\InvoiceItem::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoiceitems/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\InvoiceItem::class, $resource);
    }
}
