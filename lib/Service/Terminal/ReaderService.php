<?php

// File generated from our OpenAPI spec

namespace StripePhp\Service\Terminal;

class ReaderService extends \StripePhp\Service\AbstractService
{
    /**
     * Returns a list of <code>Reader</code> objects.
     *
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Collection<\StripePhp\Terminal\Reader>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/terminal/readers', $params, $opts);
    }

    /**
     * Creates a new <code>Reader</code> object.
     *
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Terminal\Reader
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/terminal/readers', $params, $opts);
    }

    /**
     * Deletes a <code>Reader</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Terminal\Reader
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Retrieves a <code>Reader</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Terminal\Reader
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }

    /**
     * Updates a <code>Reader</code> object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Terminal\Reader
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/terminal/readers/%s', $id), $params, $opts);
    }
}
