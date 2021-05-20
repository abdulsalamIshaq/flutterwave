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

class Card extends AbstractApi
{
	/**
     * Create new virtual card
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("virtual-cards", $details);

        return $this->responseArray($response);
	}

	/**
     * Get all virtual card
     * 
     * @since 1.0
     *      *
     * @return array
     */
	public function all()
	{
		$response = $this->get("virtual-cards");

        return $this->responseArray($response);
	}

	/**
     * Get single virtual card
     * 
     * @since 1.0
	 * 
     * @param string $id
     *   *
     * @return array
     */
	public function single(string $id)
	{
		$response = $this->get("virtual-cards/{$id}");

        return $this->responseArray($response);
	}

	/**
     * Fund an existing virtual card
     * 
     * @since 1.0
     * 
     * @param string $id
     * @param int $amount
     * @param string $debit_currency
     *
     * @return array
     */
	public function fund(string $id, int $amount, string $debit_currency = 'NGN')
	{
		$response = $this->post("virtual-cards/{$id}/fund", [
			'amount' => $amount,
			'debit_currency' => $debit_currency,
		]);

        return $this->responseArray($response);
	}

	/**
     * terminate virtual card
     * 
     * @since 1.0
     * 
     * @param string $id
     *
     * @return array
     */
	public function terminate(string $id, int $amount, string $debit_currency = 'NGN')
	{
		$response = $this->post("virtual-cards/{$id}/terminate");

        return $this->responseArray($response);
	}

	/**
     * Get virtual card transactions
     * 
     * @since 1.0
	 * 
     * @param string $id
     *   *
     * @return array
     */
	public function transaction(string $id)
	{
		$response = $this->get("virtual-cards/{$id}/transactions");

        return $this->responseArray($response);
	}

	/**
     * Withdraw existing funds from a virtual card
     * 
     * @since 1.0
	 * 
     * @param string $id
     *   *
     * @return array
     */
	public function withdraw(string $id, string $amount)
	{
		$response = $this->post("virtual-cards/{$id}/withdraw", [
			'amount' => $amount
		]);

        return $this->responseArray($response);
	}

	/**
     * Block a virtual card
     * 
     * @since 1.0
	 * 
     * @param string $id
     *   *
     * @return array
     */
	public function block(string $id)
	{
		$response = $this->put("virtual-cards/{$id}/status/block");

        return $this->responseArray($response);
	}

	/**
     * Unblock a virtual card
     * 
     * @since 1.0
	 * 
     * @param string $id
     *   *
     * @return array
     */
	public function unblock(string $id)
	{
		$response = $this->put("virtual-cards/{$id}/status/unblock");

        return $this->responseArray($response);
	}

}