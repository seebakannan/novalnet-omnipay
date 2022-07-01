<?php

/**
 * Novalnet Response.
 */
namespace Novalnet\Omnipay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;

/**
 * Novalnet Response.
 *
 * This is the response class for all Stripe requests.
 *
 * @see \Omnipay\Novalnetv2\Gateway
 */
class Response extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Request id
     *
     * @var string URL
     */
    protected $requestId = null;

    /**
     * @var array
     */
    protected $headers = [];

    public function __construct(RequestInterface $request, $data, $headers = [])
    {
        $this->request = $request;
        $this->data = (!empty($data)) ? json_decode($data, true) : [];
        $this->headers = $headers;
    }

    /**
     * To get response data
     *
     * @return array|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Is the transaction successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        if ($this->isRedirect() || (isset($this->data['result']['status']) && $this->data['result']['status'] == 'FAILURE')) {
            return false;
        }

        return true;
    }

    /**
     * Get the error message from the response.
     *
     * Returns null if the request was successful.
     *
     * @return string|null
     */
    public function getMessage()
    {
        if (!$this->isSuccessful() && isset($this->data['result']['status_text'])) {
            return $this->data['result']['status_text'];
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        if (isset($this->data['result']['redirect_url'])) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        if (isset($this->data['result']['redirect_url'])) {
            return $this->data['result']['redirect_url'];
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @return mixed
     */
    public function getRedirectData()
    {
        if ($this->isRedirect()) {
            return $this->getData();
        }

        return null;
    }

    /**
     * To get response status code
     *
     * @return int|null
     */
    public function getStatusCode()
    {
        if (isset($this->data['result']['status_code'])) {
            return $this->data['result']['status_code'];
        }

        return null;
    }

    /**
     * To get response headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
