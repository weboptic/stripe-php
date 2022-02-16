<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\InvoiceService
 */
final class InvoiceServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'in_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var InvoiceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new InvoiceService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resources->data[0]);
    }

    public function testAllLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/lines'
        );
        $resources = $this->service->allLines(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices'
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
        ]);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testFinalizeInvoice()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/finalize'
        );
        $resource = $this->service->finalizeInvoice(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testMarkUncollectible()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/mark_uncollectible'
        );
        $resource = $this->service->markUncollectible(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testPay()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/pay'
        );
        $resource = $this->service->pay(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testSendInvoice()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/send'
        );
        $resource = $this->service->sendInvoice(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testUpcoming()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/upcoming'
        );
        $resource = $this->service->upcoming(['customer' => 'cus_123']);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testUpcomingLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/upcoming/lines'
        );
        $resources = $this->service->upcomingLines();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\InvoiceLineItem::class, $resources->data[0]);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }

    public function testVoidInvoice()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/void'
        );
        $resource = $this->service->voidInvoice(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Invoice::class, $resource);
    }
}
