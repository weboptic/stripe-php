<?php

namespace StripePhp\Service;

/**
 * @internal
 * @covers \StripePhp\Service\CreditNoteService
 */
final class CreditNoteServiceTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'cn_123';

    /** @var \StripePhp\StripeClient */
    private $client;

    /** @var CreditNoteService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \StripePhp\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new CreditNoteService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resources->data[0]);
    }

    public function testAllLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID . '/lines'
        );
        $resources = $this->service->allLines(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\CreditNoteLineItem::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'invoice' => 'in_132',
            'reason' => 'duplicate',
        ]);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resource);
    }

    public function testPreview()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/preview'
        );
        $resource = $this->service->preview([
            'amount' => 100,
            'invoice' => 'in_123',
        ]);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resource);
    }

    public function testPreviewLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/preview/lines'
        );
        $resources = $this->service->previewLines([
            'amount' => 100,
            'invoice' => 'in_123',
        ]);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\CreditNoteLineItem::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resource);
    }

    public function testVoidCreditNote()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID . '/void'
        );
        $resource = $this->service->voidCreditNote(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\CreditNote::class, $resource);
    }
}
