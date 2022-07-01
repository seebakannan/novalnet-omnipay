<?php

namespace Novalnet\Omnipay\Message\Subscription;

class SubscriptionReactivateRequest extends AbstractSubscriptionRequest
{
    /**
     * @var string API endpoint
     */
    protected $endpoint = 'https://payport.novalnet.de/v2/subscription/reactivate';

    /**
     * To get HTTP method for the API call
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * To get API endpoint for void
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
