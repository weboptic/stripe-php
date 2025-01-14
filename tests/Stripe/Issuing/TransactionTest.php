<?php

namespace StripePhp\Issuing;

/**
 * @internal
 * @covers \StripePhp\Issuing\Transaction
 */
final class TransactionTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'ipi_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions'
        );
        $resources = Transaction::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Issuing\Transaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Issuing\Transaction::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\StripePhp\Issuing\Transaction::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Transaction::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\StripePhp\Issuing\Transaction::class, $resource);
    }
}
