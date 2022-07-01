<?php

namespace Novalnet\Omnipay\Message\Extension;

use Novalnet\Omnipay\Message\AbstractRequest;

class RefundRequest extends AbstractRequest
{
    /**
     * @var string API endpoint
     */
    protected $endpoint = 'https://payport.novalnet.de/v2/transaction/refund';

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
     * To set refund amount
     *
     * @param string $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    /**
     * To get refund amount
     *
     * @return array
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
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
     * To set invoicing parameters
     *
     * @param array $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setInvoicing($value)
    {
        return $this->setParameter('invoicing', $value);
    }

    /**
     * To get invoicing parameters
     *
     * @return array
     */
    public function getInvoicing()
    {
        return $this->getParameter('invoicing');
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
            'custom' => $this->getCustom(),
            'invoicing' => $this->getInvoicing()
        ];

        return $this->filterStandardParameter($data);
    }
}
