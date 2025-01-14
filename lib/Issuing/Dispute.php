<?php

// File generated from our OpenAPI spec

namespace StripePhp\Issuing;

/**
 * As a <a href="https://stripe.com/docs/issuing">card issuer</a>, you can dispute
 * transactions that the cardholder does not recognize, suspects to be fraudulent,
 * or has other issues with.
 *
 * Related guide: <a
 * href="https://stripe.com/docs/issuing/purchases/disputes">Disputing
 * Transactions</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Disputed amount. Usually the amount of the <code>transaction</code>, but can differ (usually because of currency fluctuation).
 * @property null|\StripePhp\BalanceTransaction[] $balance_transactions List of balance transactions associated with the dispute.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency The currency the <code>transaction</code> was made in.
 * @property \StripePhp\StripeObject $evidence
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \StripePhp\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $status Current status of the dispute.
 * @property string|\StripePhp\Issuing\Transaction $transaction The transaction being disputed.
 */
class Dispute extends \StripePhp\ApiResource
{
    const OBJECT_NAME = 'issuing.dispute';

    use \StripePhp\ApiOperations\All;
    use \StripePhp\ApiOperations\Create;
    use \StripePhp\ApiOperations\Retrieve;
    use \StripePhp\ApiOperations\Update;

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \StripePhp\Exception\ApiErrorException if the request fails
     *
     * @return \StripePhp\Issuing\Dispute the submited dispute
     */
    public function submit($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/submit';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
