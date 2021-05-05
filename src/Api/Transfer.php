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

class Transfer extends AbstractApi
{
	/**
     * Create bank transfer
     * 
     * @since 1.0
     * 
     * @param array $details
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("transfers", $details);

        return $this->responseArray($response);
	}

	/**
     * Retry bank transfer
     * 
     * @since 1.0
     * 
     * @param Int $id
     * @return array
     */
	public function retry(int $id)
	{
		$response = $this->post("transfers/{$id}/retries", [null]);

        return $this->responseArray($response);
	}

	/**
     * create bulk transfer
     * 
     * @since 1.0
     * 
     * @param array $details
     * @return array
     */
	public function create_bulk(array $details)
	{
		$response = $this->post("bulk-transfers", $details);

        return $this->responseArray($response);
	}

	/**
     * Get transfer fee
     * 
     * @since 1.0
     *
     * @param array $details
     * @return array
     */
	public function fee(array $details)
	{
		$response = $this->get('transfers/fee', $details);

        return $this->responseArray($response); 
	}

	/**
     * Get all transfers
     * 
     * @since 1.0
     *
     * @return array
     */
	public function all()
	{
		$response = $this->get('transfers');

        return $this->responseArray($response); 
	}

	/**
     * Get a transfer
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
	public function single(int $id)
	{
		$response = $this->get("transfers/{$id}");

        return $this->responseArray($response);
	}

	/**
     * Fetch transfer retry attempts for a single transfer on your account
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
	public function retry_attempt(int $id)
	{
		$response = $this->get("transfers/{$id}/retries");

        return $this->responseArray($response);
	}

	/**
     * Get the status of a bulk transfer on your account
     * 
     * @since 1.0
     *
     * @param int $id
     *
     * @return array
     */
	public function get_bulk(int $batch_id)
	{
		$response = $this->get("transfers", ['batch_id' => $batch_id]);

        return $this->responseArray($response);
	}

	/**
     * Transfer rates when making international transfers
     * 
     * @since 1.0
     *
     * @param int $amount
     * @param string $destination_currency
     * @param string $source_currency
     *
     * @return array
     */
	public function rate(int $amount, string $destination_currency, string $source_currency)
	{
		$response = $this->get("transfers/rates", [
			'amount' => $amount,
			'destination_currency' => $destination_currency,
			'source_currency' => $source_currency,
		]);

        return $this->responseArray($response);
	}


}