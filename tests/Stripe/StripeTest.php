<?php

namespace StripePhp;

/**
 * @internal
 * @covers \StripePhp\Stripe
 */
final class StripeTest extends \StripePhp\TestCase
{
    use TestHelper;

    /** @var array */
    protected $orig;

    /**
     * @before
     */
    public function saveOriginalValues()
    {
        $this->orig = [
            'caBundlePath' => Stripe::$caBundlePath,
        ];
    }

    /**
     * @after
     */
    public function restoreOriginalValues()
    {
        Stripe::$caBundlePath = $this->orig['caBundlePath'];
    }

    public function testCABundlePathAccessors()
    {
        Stripe::setCABundlePath('path/to/ca/bundle');
        static::assertSame('path/to/ca/bundle', Stripe::getCABundlePath());
    }
}
