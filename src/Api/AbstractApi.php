<?php

/*
 * This file is part of the Flutterwave Client.
 *
 * (c) Abdulsalam Ishaq Github: https://github.com/kayode-suc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KayodeSuc\Flutterwave\Api;

use KayodeSuc\Flutterwave\Client;
use Psr\Http\Message\ResponseInterface;
/**
 * @property $client The termii client intance
 */
class AbstractApi
{

    /**
     * The termii client instance
     * @var \KayodeSuc\Flutterwave\Client
     */
    protected $client;

    public function __construct( Client $client )
    {
        $this->client = $client;
    }

    /**
     * Handle GET method
     * 
     * @since 1.0
     * 
     * @param string $route
     * @param array $parameters
     * @return \GuzzleHttp\Response
     */
    public function get( string $route, array $parameters = [ null ])
    {
        return $this->client->get($route, $parameters);
    }

    /**
     * Handle POST method
     * 
     * @since 1.0
     * 
     * @param string $route
     * @param array $body
     * @return \GuzzleHttp\Response
     */
    public function post( string $route, array $body)
    {
        return $this->client->post($route, $body);
    }

    /**
     * Handle PUT method
     * 
     * @since 1.0
     * 
     * @param string $route
     * @param array $body
     * @return \GuzzleHttp\Response
     */
    public function put( string $route, array $body = [ null ])
    {
        return $this->client->put($route, $body);
    }

    /**
     * Handle DELETE method
     * 
     * @since 1.0
     * 
     * @param string $route
     * @param array $parameters
     * @return \GuzzleHttp\Response
     */
    public function delete( string $route, array $parameters = [ null ])
    {
        return $this->client->delete($route, $parameters);
    }

    /**
     * Change a response instance to array
     * 
     * @since 1.0
     * 
     * @param ResponseInterface $response
     * @return array
     */
    public function responseArray( ResponseInterface $response)
    {
        $body = $response->getBody()->__toString();
        // print_r($body);
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            $content = json_decode($body, true);
            if (JSON_ERROR_NONE === json_last_error()) {
                return $content;
            }
        }

        return $body;
    }

}
