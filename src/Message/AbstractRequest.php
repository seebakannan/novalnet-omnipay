<?php

namespace Novalnet\Omnipay\Message;

use Novalnet\Omnipay\Gateway;
use Symfony\Component\HttpFoundation\ParameterBag;
use Omnipay\Common\Helper;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    abstract public function getEndpoint();

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
     * {@inheritdoc}
     */
    public function initialize(array $parameters = array())
    {
        if (null !== $this->response) {
            throw new RuntimeException('Request cannot be modified after it has been sent!');
        }

        $this->parameters = new ParameterBag;

        $this->initializeParams($this, $parameters);

        return $this;
    }

    /**
     * Initialize an object with a given array of parameters
     *
     * Parameters are automatically converted to camelCase. Any parameters which do
     * not match a setter on the target object are ignored.
     *
     * @param mixed $target     The object to set parameters on
     * @param array $parameters An array of parameters to set
     */
    public function initializeParams($target, array $parameters = null)
    {
        if ($parameters) {
            foreach ($parameters as $key => $value) {
                if (is_array($value)) {
                    $this->initializeParams($target, $value);
                }

                $method = 'set'.ucfirst(Helper::camelCase($key));
                if (method_exists($target, $method)) {
                    $target->$method($value);
                }
            }
        }
    }

    /**
     * To get HTTP request headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Charset' => 'utf-8',
            'Accept' => 'application/json',
        ];
    }

    /**
     * Get filter standard param
     *
     * @param array $requestData
     *
     * @return array
     */
    protected function filterStandardParameter($requestData)
    {
        $excludedParams = ['test_mode', 'enforce_3d', 'amount'];

        foreach ($requestData as $key => $value) {
            if (is_array($value)) {
                $requestData[$key] = $this->filterStandardParameter($requestData[$key]);
            }

            if (!in_array($key, $excludedParams) && empty($requestData[$key])) {
                unset($requestData[$key]);
            }
        }

        return $requestData;
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $headers = array_merge(
            $this->getHeaders(),
            ['X-NN-Access-Key' => base64_encode($this->getPaymentAccessKey())]
        );

        $body = ($data) ? json_encode($data) : null;
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $headers,
            $body
        );

        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
