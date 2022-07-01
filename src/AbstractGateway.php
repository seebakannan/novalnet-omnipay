<?php

/**
 * Novalnet Abstract gateway.
 */
namespace Novalnet\Omnipay;

use Omnipay\Common\AbstractGateway as AbstractOmnipayGateway;

abstract class AbstractGateway extends AbstractOmnipayGateway
{
    abstract public function getName();

    /**
     * To set payment access key
     *
     * @param string $value
     * @return \Omnipay\Common\ParametersTrait
     */
    public function setPaymentAccessKey($value)
    {
        return $this->setParameter('paymentAccessKey', $value);
    }

    /**
     * To get payment access key
     *
     * @return string|null
     */
    public function getPaymentAccessKey()
    {
        return $this->getParameter('paymentAccessKey');
    }

    /**
     * Get the gateway parameters.
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'paymentAccessKey' => null
        );
    }
}
