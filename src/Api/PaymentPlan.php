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

class PaymentPlan extends AbstractApi
{
	/**
     * Create a payment plan
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("payment-plans", $details);

        return $this->responseArray($response);
	}

    /**
     * Get all payment plans
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("payment-plans");

        return $this->responseArray($response);
    }

    /**
     * Get a single payment plan
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function single(int $id)
    {
        $response = $this->get("payment-plans/{$id}");

        return $this->responseArray($response);
    }

    /**
     * Update a payment plan
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function update(int $id, array $data)
    {
        $response = $this->put("payment-plans/{$id}", $data);

        return $this->responseArray($response);
    }

    /**
     * Cancel an existing payment plan
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function cancel(int $id)
    {
        $response = $this->put("payment-plans/{$id}/cancel");

        return $this->responseArray($response);
    }
}