<?php

namespace StripePhp\Reporting;

/**
 * @internal
 * @covers \StripePhp\Reporting\ReportRun
 */
final class ReportRunTest extends \StripePhp\TestCase
{
    use \StripePhp\TestHelper;

    const TEST_RESOURCE_ID = 'frr_123';

    public function testIsCreatable()
    {
        $params = [
            'parameters' => [
                'connected_account' => 'acct_123',
            ],
            'report_type' => 'activity.summary.1',
        ];

        $this->expectsRequest(
            'post',
            '/v1/reporting/report_runs',
            $params
        );
        $resource = ReportRun::create($params);
        static::assertInstanceOf(\StripePhp\Reporting\ReportRun::class, $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs'
        );
        $resources = ReportRun::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\StripePhp\Reporting\ReportRun::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs/' . self::TEST_RESOURCE_ID
        );
        $resource = ReportRun::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\StripePhp\Reporting\ReportRun::class, $resource);
    }
}
