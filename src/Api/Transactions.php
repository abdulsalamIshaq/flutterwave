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

class Transactions extends AbstractApi
{

    /**
     * Get all transactions
     * 
     * @since 1.0
     * 
     * @return array
     */
    public function all() 
    {
        $response = $this->get('transactions');

        return $this->responseArray($response);   
    }

    /**
     * Get transaction fee
     * 
     * @since 1.0
     * 
     * @param Int $amount
     * @param string $currency
     * @return array
     */
    public function fee(int $amount, string $currency = 'NGN') 
    {
        $response = $this->get('transactions/fee', [ 'amount' => $amount, 'currency' => $currency ]);

        return $this->responseArray($response);   
    }

    /**
     * Resend transaction webhook
     * 
     * @since 1.0
     * 
     * @param Int $id
     * @return array
     */
    public function resend_webhook(int $id)
    {
        $response = $this->post("transactions/{$id}/resend-hook", [ 'id' => $id ]);

        return $this->responseArray($response);
    }

    /**
     * Get transaction refund
     * 
     * @since 1.0
     * 
     * @param Int $id
     * @param Int $amount
     * @return array
     */
    public function refund(int $id, int $amount)
    {
        $response = $this->post("transactions/{$id}/refund", [ 'amount' => $amount ]);

        return $this->responseArray($response);
    }

    /**
     * Verify transaction
     * 
     * @since 1.0
     * 
     * @param Int $id
     * @return array
     */
    public function verify(int $id)
    {   
        $response = $this->get("transactions/{$id}/verify");

        return $this->responseArray($response); 
    }

    /**
     * View transaction timeline
     * 
     * @since 1.0
     * 
     * @param Int $id
     * @return array
     */
    public function timeline(int $id)
    {
        $response = $this->get("transactions/{$id}/events");

        return $this->responseArray($response); 
    }
    

}
