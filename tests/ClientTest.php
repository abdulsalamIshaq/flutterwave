<?php

namespace KayodeSuc\Flutterwave\Tests;

use GuzzleHttp\Client as Guzzle;
use KayodeSuc\Flutterwave\Client;
use KayodeSuc\Flutterwave\Api\Transaction;
use KayodeSuc\Flutterwave\Api\Transfer;
use KayodeSuc\Flutterwave\Api\Beneficiary;
use KayodeSuc\Flutterwave\Api\Card;
use KayodeSuc\Flutterwave\Api\Account;
use KayodeSuc\Flutterwave\Api\PaymentPlan;
use KayodeSuc\Flutterwave\Api\Subscription;
use KayodeSuc\Flutterwave\Api\SubAccount;
use KayodeSuc\Flutterwave\Api\Bill;
use KayodeSuc\Flutterwave\Api\Bank;
use KayodeSuc\Flutterwave\Api\Otp;
use KayodeSuc\Flutterwave\Api\Settlement;
use KayodeSuc\Flutterwave\Api\Chargeback;
use KayodeSuc\Flutterwave\Api\Remita;

class ClientTest extends TestCase
{
    /**
     * Test for handler caching in the client oject
     */
    public function test_handler_caching()
    {
        $client = new Client('rtyuikjbvdrtyujhbvdrtyujnhbvcftyhbvcdrtg');

        $transaction = $client->transaction;
        $transfer = $client->transfer;
        $beneficiary = $client->beneficiary;
        $card = $client->card;
        $account = $client->account;
        $payment_plan = $client->payment_plan;
        $subscription = $client->subscription;
        $subaccount = $client->subaccount;
        $bill = $client->bill;
        $bank = $client->bank;
        $otp = $client->otp;
        $settlement = $client->settlement;
        $chargeback = $client->chargeback;
        $remita = $client->remita;

        $this->assertTrue($transaction == $client->transaction);
        $this->assertTrue($transfer == $client->transfer);
        $this->assertTrue($beneficiary == $client->beneficiary);
        $this->assertTrue($card == $client->card);
        $this->assertTrue($account == $client->account);
        $this->assertTrue($payment_plan == $client->payment_plan);
        $this->assertTrue($subscription == $client->subscription);
        $this->assertTrue($subaccount == $client->subaccount);
        $this->assertTrue($bill == $client->bill);
        $this->assertTrue($bank == $client->bank);
        $this->assertTrue($otp == $client->otp);
        $this->assertTrue($settlement == $client->settlement);
        $this->assertTrue($chargeback == $client->chargeback);
        $this->assertTrue($remita == $client->remita);

    }
    

    /**
     * Test for handler caching in the client oject
     */
    public function test_handler_class()
    {
        $client = new Client('rtyuikjbvdrtyujhbvdrtyujnhbvcftyhbvcdrtg');

        $this->assertTrue($client->transaction instanceof Transaction);
        $this->assertTrue($client->transfer instanceof Transfer);
        $this->assertTrue($client->beneficiary instanceof Beneficiary);
        $this->assertTrue($client->card instanceof Card);
        $this->assertTrue($client->account instanceof Account);
        $this->assertTrue($client->payment_plan instanceof PaymentPlan);
        $this->assertTrue($client->subscription instanceof Subscription);
        $this->assertTrue($client->subaccount instanceof SubAccount);
        $this->assertTrue($client->bill instanceof Bill);
        $this->assertTrue($client->bank instanceof Bank);
        $this->assertTrue($client->otp instanceof Otp);
        $this->assertTrue($client->settlement instanceof Settlement);
        $this->assertTrue($client->chargeback instanceof Chargeback);
        $this->assertTrue($client->remita instanceof Remita);
    }

    /**
     * Test for handler caching in the client oject
     */
    public function test_mass_fill()
    {
        $client = new Client('rtyuikjbvdrtyujhbvdrtyujnhbvcftyhbvcdrtg');

        $client->fillOptions([
            'httpClient' => new Guzzle([
                // Base URI is used with relative requests
                'base_uri' => $client->baseUri(),
                // You can set any number of default request options.
                'timeout'  => 10.0,
            ]),
        ]);

        $this->assertTrue($client->getHttpClient() instanceof Guzzle);

    }
    
}