<?php

/**
 * Novalnet Gateway.
 */
namespace Novalnet\Omnipay;

class Gateway extends AbstractGateway
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Novalnet';
    }

    /**
     * @inheritdoc
     * Authorize and immediately capture an amount on the customers card
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Payment\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Payment\PurchaseRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Handle return from off-site gateways after purchase
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Payment\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Payment\CompletePurchaseRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Authorize an amount on the customers card
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Payment\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Payment\AuthorizeRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Handle return from off-site gateways after authorization
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Payment\CompleteAuthorizeRequest
     */
    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Payment\CompleteAuthorizeRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Fetches transaction information from the Novalnet server
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Payment\FetchTransactionRequest
     */
    public function fetchTransaction(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Payment\FetchTransactionRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Capture an amount you have previously authorized
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\CaptureRequest
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\CaptureRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Voiding an amount you have previously authorized
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\VoidRequest
     */
    public function void(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\VoidRequest', $parameters);
    }

    /**
     * @inheritdoc
     * Refund an already processed transaction
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\RefundRequest
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\RefundRequest', $parameters);
    }

    /**
     * This action will update the existing transaction`s attributes
     * like amount, Due date and Order number.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\UpdateTransactionRequest
     */
    public function updateTransaction(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\UpdateTransactionRequest', $parameters);
    }

    /**
     * This action will cancel the existing instalments.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\CancelInstalmentRequest
     */
    public function cancelInstalment(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\CancelInstalmentRequest', $parameters);
    }

    /**
     * This API will list the available payment methods along with the
     * merchant credentials like Vendor ID, Project ID, available tariff, etc.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\FetchMerchantInformationRequest
     */
    public function fetchMerchantInformation(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\FetchMerchantInformationRequest', $parameters);
    }

    /**
     * This action is used to create/add the new affiliate.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\CreateAffiliateRequest
     */
    public function createAffiliate(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\CreateAffiliateRequest', $parameters);
    }

    /**
     * This action is used to configure webhook URL for notification handling.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Extension\ConfigureWebhookRequest
     */
    public function configureWebhook(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Extension\ConfigureWebhookRequest', $parameters);
    }

    /**
     * This action will reactivate the existing subscription which has been suspended before.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Subscription\SubscriptionReactivateRequest
     */
    public function subscriptionReactivate(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Subscription\SubscriptionReactivateRequest', $parameters);
    }

    /**
     * This action will pause the existing subscription.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Subscription\SubscriptionSuspendRequest
     */
    public function subscriptionSuspend(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Subscription\SubscriptionSuspendRequest', $parameters);
    }

    /**
     * This action will update the existing subscription`s attributes
     * like amount or next recurring date.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Subscription\SubscriptionUpdateRequest
     */
    public function subscriptionUpdate(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Subscription\SubscriptionUpdateRequest', $parameters);
    }

    /**
     * This action will cancel the existing subscription.
     *
     * @param array $parameters
     * @return \Novalnet\Omnipay\Message\Subscription\SubscriptionCancelRequest
     */
    public function subscriptionCancel(array $parameters = array())
    {
        return $this->createRequest('\Novalnet\Omnipay\Message\Subscription\SubscriptionCancelRequest', $parameters);
    }
}
