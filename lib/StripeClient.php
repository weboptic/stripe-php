<?php

// File generated from our OpenAPI spec

namespace StripePhp;

/**
 * Client used to send requests to Stripe's API.
 *
 * @property \StripePhp\Service\AccountLinkService $accountLinks
 * @property \StripePhp\Service\AccountService $accounts
 * @property \StripePhp\Service\ApplePayDomainService $applePayDomains
 * @property \StripePhp\Service\ApplicationFeeService $applicationFees
 * @property \StripePhp\Service\BalanceService $balance
 * @property \StripePhp\Service\BalanceTransactionService $balanceTransactions
 * @property \StripePhp\Service\BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property \StripePhp\Service\ChargeService $charges
 * @property \StripePhp\Service\Checkout\CheckoutServiceFactory $checkout
 * @property \StripePhp\Service\CountrySpecService $countrySpecs
 * @property \StripePhp\Service\CouponService $coupons
 * @property \StripePhp\Service\CreditNoteService $creditNotes
 * @property \StripePhp\Service\CustomerService $customers
 * @property \StripePhp\Service\DisputeService $disputes
 * @property \StripePhp\Service\EphemeralKeyService $ephemeralKeys
 * @property \StripePhp\Service\EventService $events
 * @property \StripePhp\Service\ExchangeRateService $exchangeRates
 * @property \StripePhp\Service\FileLinkService $fileLinks
 * @property \StripePhp\Service\FileService $files
 * @property \StripePhp\Service\Identity\IdentityServiceFactory $identity
 * @property \StripePhp\Service\InvoiceItemService $invoiceItems
 * @property \StripePhp\Service\InvoiceService $invoices
 * @property \StripePhp\Service\Issuing\IssuingServiceFactory $issuing
 * @property \StripePhp\Service\MandateService $mandates
 * @property \StripePhp\Service\OAuthService $oauth
 * @property \StripePhp\Service\OrderReturnService $orderReturns
 * @property \StripePhp\Service\OrderService $orders
 * @property \StripePhp\Service\PaymentIntentService $paymentIntents
 * @property \StripePhp\Service\PaymentLinkService $paymentLinks
 * @property \StripePhp\Service\PaymentMethodService $paymentMethods
 * @property \StripePhp\Service\PayoutService $payouts
 * @property \StripePhp\Service\PlanService $plans
 * @property \StripePhp\Service\PriceService $prices
 * @property \StripePhp\Service\ProductService $products
 * @property \StripePhp\Service\PromotionCodeService $promotionCodes
 * @property \StripePhp\Service\QuoteService $quotes
 * @property \StripePhp\Service\Radar\RadarServiceFactory $radar
 * @property \StripePhp\Service\RefundService $refunds
 * @property \StripePhp\Service\Reporting\ReportingServiceFactory $reporting
 * @property \StripePhp\Service\ReviewService $reviews
 * @property \StripePhp\Service\SetupAttemptService $setupAttempts
 * @property \StripePhp\Service\SetupIntentService $setupIntents
 * @property \StripePhp\Service\ShippingRateService $shippingRates
 * @property \StripePhp\Service\Sigma\SigmaServiceFactory $sigma
 * @property \StripePhp\Service\SkuService $skus
 * @property \StripePhp\Service\SourceService $sources
 * @property \StripePhp\Service\SubscriptionItemService $subscriptionItems
 * @property \StripePhp\Service\SubscriptionScheduleService $subscriptionSchedules
 * @property \StripePhp\Service\SubscriptionService $subscriptions
 * @property \StripePhp\Service\TaxCodeService $taxCodes
 * @property \StripePhp\Service\TaxRateService $taxRates
 * @property \StripePhp\Service\Terminal\TerminalServiceFactory $terminal
 * @property \StripePhp\Service\TokenService $tokens
 * @property \StripePhp\Service\TopupService $topups
 * @property \StripePhp\Service\TransferService $transfers
 * @property \StripePhp\Service\WebhookEndpointService $webhookEndpoints
 */
class StripeClient extends BaseStripeClient
{
    /**
     * @var \StripePhp\Service\CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new \StripePhp\Service\CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
