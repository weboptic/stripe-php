<?php

// File generated from our OpenAPI spec

namespace StripePhp;

/**
 * A Mandate is a record of the permission a customer has given you to debit their
 * payment method.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \StripePhp\StripeObject $customer_acceptance
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \StripePhp\StripeObject $multi_use
 * @property string|\StripePhp\PaymentMethod $payment_method ID of the payment method associated with this mandate.
 * @property \StripePhp\StripeObject $payment_method_details
 * @property \StripePhp\StripeObject $single_use
 * @property string $status The status of the mandate, which indicates whether it can be used to initiate a payment.
 * @property string $type The type of the mandate.
 */
class Mandate extends ApiResource
{
    const OBJECT_NAME = 'mandate';

    use ApiOperations\Retrieve;
}
