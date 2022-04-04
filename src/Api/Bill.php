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

class Bill extends AbstractApi
{
	/**
     * Get all bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function categories()
    {
        $response = $this->get("bill-categories");

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getAirtime()
    {
        $response = $this->get("bill-categories", ['airtime' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getData()
    {
        $response = $this->get("bill-categories", ['data_bundle' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getInternet()
    {
        $response = $this->get("bill-categories", ['internet' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getPower()
    {
        $response = $this->get("bill-categories", ['power' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getCable()
    {
        $response = $this->get("bill-categories", ['cables' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories
     * 
     * @since 1.0
     *
     * @return array
     */
    public function getToll()
    {
        $response = $this->get("bill-categories", ['toll' => 1]);

        return $this->responseArray($response);
    }

    /**
     * Get all airtime bill categories using biller code
     * 
     * @since 1.0
     * 
     * @param String $item_code
     *
     * @return array
     */
    public function code(String $item_code)
    {
        $response = $this->get("bill-categories", ['biller_code' => $code]);

        return $this->responseArray($response);
    }

    

    /**
     * Validate services bills like DSTV smartcard no, Meter number etc.
     * 
     * @param string $item_code
     * 
     * @since 1.0
     *
     * @return array
     */
    public function validate(string $item_code, String $code, String $customer)
    {
        $response = $this->get("bill-items/{$item_code}/validate", [
            'code' => $code,
            'customer' => $customer
        ]);

        return $this->responseArray($response);
    }

    /**
     * Create new bill
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create(array $details)
	{
		$response = $this->post("bills", $details);

        return $this->responseArray($response);
	}

	/**
     * Create bulk bills
     * 
     * @since 1.0
     * 
     * @param array $details
     *
     * @return array
     */
	public function create_bulk(array $details)
	{
		$response = $this->post("bills", $details);

        return $this->responseArray($response);
	}

	/**
     * Get the status of a bill
     * 
     * @param string $reference
     * 
     * @since 1.0
     *
     * @return array
     */
    public function status(string $reference)
    {
        $response = $this->get("bills/{$reference}");

        return $this->responseArray($response);
    }

    /**
     * Get all bill payments
     * 
     * @since 1.0
     *
     * @return array
     */
    public function all()
    {
        $response = $this->get("bills");

        return $this->responseArray($response);
    }
}
