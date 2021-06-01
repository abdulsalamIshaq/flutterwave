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

class Beneficiary extends AbstractApi
{
	/**
     * Create new bebeficiary
     * 
     * @since 1.0
     * 
     * @param string $account_number
     * @param string $account_bank
     * @param string $beneficiary_name
     *
     * @return array
     */
	public function create(string $account_number, string $account_bank, string $beneficiary_name)
	{
		$response = $this->post("beneficiaries", [
			'account_number' => $account_number,
			'account_bank' => $account_bank,
			'beneficiary_name' => $beneficiary_name,
		]);

        return $this->responseArray($response);
	}

	/**
     * Get all beneficiaries
     * 
     * @since 1.0
     *
     * @return array
     */
	public function all()
	{
		$response = $this->get("beneficiaries");

		return $this->responseArray($response);
	}

	/**
     * Get a single transfer beneficiary details
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
	public function single(int $id)
	{
		$response = $this->get("beneficiaries/{$id}");

		return $this->responseArray($response);
	}

	/**
     * Get a single transfer beneficiary details
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
	public function remove(int $id)
	{
		$response = $this->delete("beneficiaries/{$id}");

		return $this->responseArray($response);
	}
}