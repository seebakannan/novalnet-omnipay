<?php

namespace Novalnet\Omnipay\Message\Payment;

class AuthorizeRequest extends PurchaseRequest
{
    protected $endpoint = 'https://payport.novalnet.de/v2/authorize';

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
     * To get API endpoint for Authorize
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }
}
