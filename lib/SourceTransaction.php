<?php

namespace StripePhp;

/**
 * Class SourceTransaction.
 *
 * @property string $id
 * @property string $object
 * @property \StripePhp\StripeObject $ach_credit_transfer
 * @property int $amount
 * @property int $created
 * @property string $customer_data
 * @property string $currency
 * @property string $type
 */
class SourceTransaction extends ApiResource
{
    const OBJECT_NAME = 'source_transaction';
}
