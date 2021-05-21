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

class Otp extends AbstractApi
{
	/**
     * Create otp
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
    public function create(array $details)
    {
        $response = $this->post("otps", $details);

        return $this->responseArray($response);
    }

    /**
     * validate otp
     * 
     * @since 1.0
     * 
     * @param string $reference
     * @param int $otp
     *
     * @return array
     */
    public function validate(string $reference, int $otp)
    {
        $response = $this->post("otps/{$reference}/validate", [ 'otp' => $otp ]);

        return $this->responseArray($response);
    }
}