<?php

// File generated from our OpenAPI spec

namespace StripePhp\Service\Sigma;

class ScheduledQueryRunService extends \StripePhp\Service\AbstractService
{
    /**
     * Returns a list of scheduled query runs.
     *
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Collection<\StripePhp\Sigma\ScheduledQueryRun>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/sigma/scheduled_query_runs', $params, $opts);
    }

    /**
     * Retrieves the details of an scheduled query run.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Sigma\ScheduledQueryRun
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/sigma/scheduled_query_runs/%s', $id), $params, $opts);
    }
}
