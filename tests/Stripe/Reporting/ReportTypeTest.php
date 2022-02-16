<?php

namespace StripePhp\Reporting;

/**
 * @internal
 * @covers \StripePhp\Reporting\ReportType
 */
final class ReportTypeTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'activity.summary.1';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types'
        );
        $resources = ReportType::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Reporting\ReportType::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types/' . self::TEST_RESOURCE_ID
        );
        $resource = ReportType::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Reporting\ReportType::class, $resource);
    }
}
