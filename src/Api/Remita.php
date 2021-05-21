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

class Remita extends AbstractApi
{
	/**
     * Get list of government agencies you can pay
     *      
     * @since 1.0
     *
     * @return array
     */
    public function agencies()
    {
        $response = $this->get("billers");

        return $this->responseArray($response);
    }

    /**
     * Get list of products under a government agency.
     *      
     * @param string $biller_code
     * 
     * @since 1.0
     *
     * @return array
     */
    public function products(string $biller_code)
    {
        $response = $this->get("billers/{$biller_code}/products");

        return $this->responseArray($response);
    }

    /**
     * Get the amount to be paid for a product
     *      
     * @param string $biller_code
     * @param string $product_code
     * 
     * @since 1.0
     *
     * @return array
     */
    public function amount(string $biller_code, string $product_code)
    {
        $response = $this->get("billers/{$biller_code}/products/{$product_code}");

        return $this->responseArray($response);
    }

    /**
     * Create order using billing code and product code
     *      
     * @param string $biller_code
     * @param string $product_code
     * @param array $details
     * 
     * @since 1.0
     *
     * @return array
     */
    public function order(string $biller_code, string $product_code, array $details)
    {
        $response = $this->post("billers/{$biller_code}/products/{$product_code}/orders", $details);

        return $this->responseArray($response);
    }

    /**
     * update an order
     *      
     * @param string $biller_code
     * @param string $product_code
     * @param array $details
     * 
     * @since 1.0
     *
     * @return array
     */
    public function update(string $biller_id, string $product_id, array $details)
    {
        $response = $this->put("billers/{$biller_id}/products/{$product_id}/orders", $details);

        return $this->responseArray($response);
    }

}