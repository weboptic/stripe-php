<?php

// File generated from our OpenAPI spec

namespace StripePhp\Service\Terminal;

class ConnectionTokenService extends \StripePhp\Service\AbstractService
{
    /**
     * To connect to a reader the Stripe Terminal SDK needs to retrieve a short-lived
     * connection token from Stripe, proxied through your server. On your backend, add
     * an endpoint that creates and returns a connection token.
     *
     * @param null|array $params
     * @param null|array|\StripePhp\Util\RequestOptions $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Terminal\ConnectionToken
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/terminal/connection_tokens', $params, $opts);
    }
}
