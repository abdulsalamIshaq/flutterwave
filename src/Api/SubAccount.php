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

class Subaccount extends AbstractApi
{
	/**
     * Create a subaccount
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("subaccounts", $details);

        return $this->responseArray($response);
	}

	/**
     * Get all subaccounts
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("subaccounts");

        return $this->responseArray($response);
    }


    /**
     * Get a subaccount
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function single(int $id)
    {
        $response = $this->get("subaccounts/{$id}");

        return $this->responseArray($response);
    }

    /**
     * Update a subaccount
     * 
     * @since 1.0
     *
     * @param int $id
     * @param array $data
     *
     * @return array
     */
    public function update(int $id, array $data)
    {
        $response = $this->put("subaccounts/{$id}", $data);

        return $this->responseArray($response);
    }

    /**
     * Delete a subaccount
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function remove(int $id)
    {
        $response = $this->delete("subaccounts/{$id}");

        return $this->responseArray($response);
    }
}