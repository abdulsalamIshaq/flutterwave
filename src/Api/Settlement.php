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

class Settlement extends AbstractApi
{
	/**
     * Get all settlement
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("settlements");

        return $this->responseArray($response);
    }

    /**
     * Get a settlement
     * 
     * @param int $id
     * 
     * @since 1.0
     *
     * @return array
     */
    public function single(int $id)
    {
        $response = $this->get("settlements/{$id}");

        return $this->responseArray($response);
    }
}