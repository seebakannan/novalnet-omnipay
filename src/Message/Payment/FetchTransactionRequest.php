<?php

namespace Novalnet\Omnipay\Message\Payment;

class FetchTransactionRequest extends AbstractPaymentRequest
{
    protected $endpoint = 'https://payport.novalnet.de/v2/transaction/details';

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
     * To get API endpoint for complete purchase
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * To set tid
     *
     * @param string|int $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setTid($value)
    {
        return $this->setParameter('tid', $value);
    }

    /**
     * To get tid
     *
     * @return string|int
     */
    public function getTid()
    {
        return $this->getParameter('tid');
    }

    /**
     * To get request parameters
     *
     * @return array
     */
    public function getData()
    {
        $this->validate('transaction', 'paymentAccessKey', 'tid');

        $data = [
            'transaction' => $this->getTransaction(),
            'custom' => $this->getCustom()
        ];

        return $this->filterStandardParameter($data);
    }
}
