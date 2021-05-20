<?php

/*
 * This file is part of the Flutterwave Client.
 *
 * (c) Abdulsalam Ishaq Github: https://github.com/kayode-suc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KayodeSuc\Flutterwave\HttpClient;

use GuzzleHttp\Exception\BadResponseException;

trait SendHttpRequests
{

    protected $httpClient;

    /**
     * Return the default header data
     * 
     * @since 1.0
     * 
     * @return array
     */
    public function headers()
    {
        return [
            'User-Agent' => $this->getUserAgent(),
            'Content-Type'     => 'application/json',
            'Accept'     => 'application/json',
            'Authorization' => 'Bearer ' . $this->getKey(), 
        ];
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
        return $this->request('GET', $route, [
            'headers' => $this->headers(),
            'query' => $parameters,
        ]);
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
        return $this->request('POST', $route, [
            'headers' => $this->headers(),
            'body' => json_encode($body),
        ]);
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
        return $this->request('PUT', $route, [
            'headers' => $this->headers(),
            'body' => json_encode($body),
        ]);
    }

    /**
     * Handle DELETE method
     * 
     * @since 1.0
     * 
     * @param string $route
     * @return \GuzzleHttp\Response
     */
    public function delete( string $route)
    {
        return $this->request('DELETE', $route, [
            'headers' => $this->headers(),
        ]);
    }

    /**
     * Handle GET method
     * 
     * @since 1.0
     * 
     * @param string $method
     * @param string $route
     * @param array $data
     * @return \GuzzleHttp\Response
     */
    public function request(string $method, string $route, array $data)
    {
        try {
            return $this->httpClient->request( $method, $route, $data );
        } catch ( BadResponseException $th) {
            if ($th->hasResponse()) {
                return $th->getResponse();
            }else{
                throw $th;
            }
        }
    }
    
}
