<?php

// File generated from our OpenAPI spec

namespace StripePhp\Service;

class TaxCodeService extends \StripePhp\Service\AbstractService
{
    /**
     * A list of <a href="https://stripe.com/docs/tax/tax-codes">all tax codes
     * available</a> to add to Products in order to allow specific tax calculations.
     *
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Collection<\StripePhp\TaxCode>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/tax_codes', $params, $opts);
    }

    /**
     * Retrieves the details of an existing tax code. Supply the unique tax code ID and
     * Stripe will return the corresponding tax code information.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\TaxCode
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/tax_codes/%s', $id), $params, $opts);
    }
}
