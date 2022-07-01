<?php

namespace Novalnet\Omnipay\Message\Payment;

class PurchaseRequest extends AbstractPaymentRequest
{
    /**
     * @var API endpoint
     */
    protected $endpoint = 'https://payport.novalnet.de/v2/payment';

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
     * To get API endpoint for refund
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

   /**
     * To get request parameters
     *
     * @return array
     */
    public function getData()
    {
        $this->validate('merchant', 'customer', 'transaction', 'signature', 'tariff', 'paymentAccessKey');

        $data = [
            'merchant' => $this->getMerchant(),
            'customer' => $this->getCustomer(),
            'transaction' => $this->getTransaction(),
            'subscription' => $this->getSubscription(),
            'instalment' => $this->getInstalment(),
            'marketplace' => $this->getMarketplace(),
            'affiliate' => $this->getAffiliate(),
            'invoicing' => $this->getInvoicing(),
            'custom' => $this->getCustom()
        ];

        //~ print"<pre>"; print_r($this->filterStandardParameter($data));

        //~ die;

        return $this->filterStandardParameter($data);
    }
}
