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
     * @param string|array $from
     * @param string $to
     * @param string $sender_id
     * @param string $channel
     * @return array
     */
    public function all() 
    {
        $response = $this->get('transactions');

        return $this->responseArray($response);   
    }
    

}
