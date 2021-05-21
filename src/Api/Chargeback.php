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

class Chargeback extends AbstractApi
{
	/**
     * Get all chargebacks
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("chargebacks");

        return $this->responseArray($response);
    }

    /**
     * Get a chargeback
     * 
     * @param string $flw_ref
     * 
     * @since 1.0
     *
     * @return array
     */
    public function single(string $flw_ref)
    {
        $response = $this->get("chargebacks", [ 'flw_ref' => $flw_ref ]);

        return $this->responseArray($response);
    }
}