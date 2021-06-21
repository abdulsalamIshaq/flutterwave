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

class Account extends AbstractApi
{
	/**
     * Create a virtual account number
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("virtual-account-numbers", $details);

        return $this->responseArray($response);
	}

    /**
     * Create bulk virtual account number
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
    public function create_bulk(array $details)
    {
        $response = $this->post("bulk-virtual-account-numbers", $details);

        return $this->responseArray($response);
    }

    /**
     * Get bulk virtual account numbers using batch id
     * 
     * @since 1.0
     * 
     * @param string $batch_id
     *   
     * @return array
     */
    public function bulk(string $batch_id)
    {
        $response = $this->get("bulk-virtual-account-numbers/{$batch_id}");

        return $this->responseArray($response);
    }

    /**
     * Get a virtual account number using order reference
     * 
     * @since 1.0
     * 
     * @param string $order_ref
     *   
     * @return array
     */
    public function single(string $order_ref)
    {
        $response = $this->get("virtual-account-numbers/{$order_ref}");

        return $this->responseArray($response);
    }
}