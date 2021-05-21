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

class Bank extends AbstractApi
{
	/**
     * Get list of banks 
     * 
     * @param string $country
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all(string $country = 'NG')
    {
        $response = $this->get("banks/{$country}");

        return $this->responseArray($response);
    }

    /**
     * Get a list of bank branches
     * 
     * @param int $id
     * 
     * @since 1.0
     *
     * @return array
     */
    public function branches(int $id)
    {
        $response = $this->get("banks/{$id}/branches");

        return $this->responseArray($response);
    }
}