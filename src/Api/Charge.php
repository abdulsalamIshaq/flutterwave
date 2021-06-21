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

class Charge extends AbstractApi
{
	/**
     * Charge a card or account
     * 
     * @since 1.0
     * 
     * @param string $type
     * @param array $details
     *
     * @return array
     */
	public function create(string $type = 'card', array $details)
	{
		$response = $this->post("charges?type={$type}", $details);

          return $this->responseArray($response);
	}
}