<?php

namespace Novalnet\Omnipay\Message\Extension;

use Novalnet\Omnipay\Message\AbstractRequest;

class CreateAffiliateRequest extends AbstractRequest
{
    /**
     * @var string API endpoint
     */
    protected $endpoint = 'https://payport.novalnet.de/v2/affiliate/create';

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
     * To set merchant parameters
     *
     * @param array $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setMerchant($value)
    {
        return $this->setParameter('merchant', $value);
    }

    /**
     * To get merchant parameters
     *
     * @return array
     */
    public function getMerchant()
    {
        return $this->getParameter('merchant');
    }

    /**
     * To set affiliate parameters
     *
     * @param array $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setAffiliate($value)
    {
        return $this->setParameter('affiliate', $value);
    }

    /**
     * To get affiliate parameters
     *
     * @return array
     */
    public function getAffiliate()
    {
        return $this->getParameter('affiliate');
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
     * To set signature
     *
     * @param string $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setSignature($value)
    {
        return $this->setParameter('signature', $value);
    }

    /**
     * To get custom parameters
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->getParameter('signature');
    }

    /**
     * To get request parameters
     *
     * @return array
     */
    public function getData()
    {
        $this->validate('merchant', 'affiliate', 'signature', 'paymentAccessKey');

        $data = [
            'merchant' => $this->getMerchant(),
            'affiliate' => $this->getAffiliate(),
            'custom' => $this->getCustom()
        ];

        return $this->filterStandardParameter($data);
    }
}
