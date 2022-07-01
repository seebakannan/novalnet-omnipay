<?php

namespace Novalnet\Omnipay\Message\Extension;

use Novalnet\Omnipay\Message\AbstractRequest;

class UpdateTransactionRequest extends AbstractRequest
{
    /**
     * @var string API endpoint
     */
    protected $endpoint = 'https://payport.novalnet.de/v2/transaction/update';

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

    /**
     * To set transaction parameters
     *
     * @param array $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setTransaction($value)
    {
        return $this->setParameter('transaction', $value);
    }

    /**
     * To get transaction parameters
     *
     * @return array
     */
    public function getTransaction()
    {
        return $this->getParameter('transaction');
    }

    /**
     * To set custom parameters
     *
     * @param array $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setCustom($value)
    {
        return $this->setParameter('custom', $value);
    }

    /**
     * To get custom parameters
     *
     * @return array
     */
    public function getCustom()
    {
        return $this->getParameter('custom');
    }

    /**
     * To set tid
     *
     * @param string $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setTid($value)
    {
        return $this->setParameter('tid', $value);
    }

    /**
     * To get tid
     *
     * @return array
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
        $this->validate('transaction', 'tid', 'paymentAccessKey');

        $data = [
            'transaction' => $this->getTransaction(),
            'custom' => $this->getCustom()
        ];

        return $this->filterStandardParameter($data);
    }
}
