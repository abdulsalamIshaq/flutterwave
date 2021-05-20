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

class Subscription extends AbstractApi
{
	/**
     * Get all subscriptions
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("subscriptions");

        return $this->responseArray($response);
    }

    /**
     * Cancel a subscription
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function cancel(int $id)
    {
        $response = $this->put("subscriptions/id/cancel");

        return $this->responseArray($response);
    }

    /**
     * Activate a subscription
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
    public function activate(int $id)
    {
        $response = $this->put("subscriptions/{$id}/activate");

        return $this->responseArray($response);
    }
}