<?php

/*
 * This file is part of the Flutterwave Client.
 *
 * (c) Abdulsalam Ishaq Github: https://github.com/kayode-suc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KayodeSuc\Flutterwave;

use GuzzleHttp\Client as Guzzle;
use KayodeSuc\Flutterwave\HttpClient\HttpClientInterface;
use KayodeSuc\Flutterwave\HttpClient\SendHttpRequests;

class Client implements HttpClientInterface
{

    use SendHttpRequests;

    /**
     * Base url of termii api
     * @var string
     */
    public $url = 'https://api.flutterwave.com/v3/';

    /**
     * User agent for the HTTP client
     * @var string
     */
    protected $userAgent = 'Flutterwave Library: kayode-suc/flutterwave';

    /**
     * Secret Key for Flutterwave api
     * @var string
     */
    protected $key;

    public function __construct(string $key, array $options = null )
    {
        $this->key = $key;

        if (isset($options)) $this->fillOptions($options);

        $this->httpClient = new Guzzle([
            // Base URI is used with relative requests
            'base_uri' => $this->baseUri(),
            // You can set any number of default request options.
            'timeout'  => 10.0,
        ]);
    }

    /**
     * Mass fill the client option
     * 
     * @since 1.0
     * 
     * @param array $options Associate Array contating the options
     * @return static $this Return the client object for method chaining
     */
    public function fillOptions(array $options)
    {
        foreach ($options as $key => $value) {
            if (is_string($key) && property_exists($this, $key)) $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * Dynamic property to get the api handlers
     * 
     * @since 1.0
     * 
     * @param string $tag Endpoint Tag Name
     */
    public function __get(string $tag)
    {
        return $this->api($tag);
    }

    /**
     * Get the endpoint handler through tag name
     * 
     * @since 1.0
     * 
     * @param string $tag Endpoint Tag Name
     */
    public function api( string $tag )
    {
        $class = $this->getEndpointHandler($tag);

        return new $class($this);
    }

    /**
     * Get the endpoint handler class name through tag name
     * 
     * @since 1.0
     * 
     * @param string $tag Endpoint Tag Name
     */
    protected function getEndpointHandler( string $tag)
    {
        $map = $this->apiMap();

        if (isset($map[$tag])) {
            return $map[$tag];
        }

        throw new \Exception("The [$tag] is not a valid Endpoint tag.");
    }

    /**
     * Get the base URI of the client
     * 
     * @since 1.0
     * 
     * @return string
     */
    public function baseUri()
    {
        return $this->url;
    }

    /**
     * Get the Secret key of the client
     * 
     * @since 1.0
     * 
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

     /**
     * Get the http client
     * 
     * @since 1.0
     * 
     * @return string
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Get the user agent for the http client
     * @since 1.0
     * 
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }
    
    public function apiMap()
    {
        return [
            'transaction' => \KayodeSuc\Flutterwave\Api\Transaction::class,
            'transfer' => \KayodeSuc\Flutterwave\Api\Transfer::class,
            'beneficiary' => \KayodeSuc\Flutterwave\Api\Beneficiary::class,
            'card' => \KayodeSuc\Flutterwave\Api\Card::class,
            'account' => \KayodeSuc\Flutterwave\Api\Account::class,
            'payment_plan' => \KayodeSuc\Flutterwave\Api\PaymentPlan::class,
            'subscription' => \KayodeSuc\Flutterwave\Api\Subscription::class,
            'subaccount' => \KayodeSuc\Flutterwave\Api\SubAccount::class,
            'bill' => \KayodeSuc\Flutterwave\Api\Bill::class,
            'bank' => \KayodeSuc\Flutterwave\Api\Bank::class,
            'otp' => \KayodeSuc\Flutterwave\Api\Otp::class,
            'settlement' => \KayodeSuc\Flutterwave\Api\Settlement::class,
            'chargeback' => \KayodeSuc\Flutterwave\Api\Chargeback::class,
            'remita' => \KayodeSuc\Flutterwave\Api\Remita::class,
            'charge' => \KayodeSuc\Flutterwave\Api\Charge::class,
        ];
    }
    
}
