<?php

// File generated from our OpenAPI spec

namespace StripePhp\Terminal;

/**
 * A Location represents a grouping of readers.
 *
 * Related guide: <a href="https://stripe.com/docs/terminal/fleet/locations">Fleet
 * Management</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \StripePhp\StripeObject $address
 * @property string $display_name The display name of the location.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \StripePhp\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 */
class Location extends \StripePhp\ApiResource
{
    const OBJECT_NAME = 'terminal.location';

    use \StripePhp\ApiOperations\All;
    use \StripePhp\ApiOperations\Create;
    use \StripePhp\ApiOperations\Delete;
    use \StripePhp\ApiOperations\Retrieve;
    use \StripePhp\ApiOperations\Update;
}
