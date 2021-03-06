# Flutterwave Client

A simple Object Oriented PHP Client for Flutterwave.

Uses [Flutterwave API](https://developer.flutterwave.com/reference).


## Requirements

* PHP >= 7.2
* Guzzlehttp ~6|~7

## Installation

Via [Composer](https://getcomposer.org).
```bash
composer require kayode-suc/flutterwave
```

### PHP 7.2+:

This project is still in beta version and has not been upload to packagis

## Transactions

### Get all transactions

https://developer.flutterwave.com/reference#get-all-transactions
```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');

// $client->transaction->all();
$transactions = $client->transaction->all();

print_r($transactions);

```
### Get transaction fee

https://developer.flutterwave.com/reference#get-transaction-fee

```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');
/**
 * Get transaction fee
 * 
 * @since 1.0
 * 
 * @param Int $amount
 * @param string $currency
 * @param string $payment_type
 * @return array
 * 
 * $client->transaction->fee(int $amount, string $currency = 'NGN', string $payment_type = 'card') 
 */

$fee = $client->transaction->fee(10000);

print_r($fee);
```

### Resend transaction webhook

https://developer.flutterwave.com/reference#resend-transaction-webhook

```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');

/**
 * Resend transaction webhook
 * 
 * @since 1.0
 * 
 * @param Int $id
 * @return array
 *
 * $id - This is the transaction unique identifier.
 *
 * $client->transaction->resend_webhook(int $id)
 *
 */

$transaction = $client->transaction->resend_webhook(1000);

print_r($transaction);
```

### Transaction refund

https://developer.flutterwave.com/reference#transaction-refund

```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');

/**
 * initiate a transaction refund
 * 
 * @since 1.0
 * 
 * @param Int $id
 * @param Int $amount
 * @return array
 *
 * $client->transaction->refund(int $id, int $amount)
 *
 * $id - This is the transaction unique identifier.
 * $amount - amount.
 *
 */

$transaction = $client->transaction->refund(2069367, 50);

print_r($transaction);
```

### Verify Transaction

https://developer.flutterwave.com/reference#verify-transaction

```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');

/**
 * Verify transactions using the transaction ID
 * 
 * @since 1.0
 * 
 * @param Int $id
 *
 * @return array
 *
 * $client->transaction->verify(int $id)
 *
 * $id - This is the transaction unique identifier.
 * $amount - amount.
 *
 */

$transaction = $client->transaction->verify(2069367));

print_r($transaction);
```

### View transaction timeline

https://developer.flutterwave.com/reference#get-transaction-events

```php
<?php

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

use KayodeSuc\Flutterwave\Client;

// Create a new Client instance
$client = new Client('Your Api Key');

/**
 * View Transaction Timeline
 * 
 * @since 1.0
 * 
 * @param Int $id
 *
 * @return array
 *
 * $client->transaction->timeline(int $id)
 *
 * $id - This is the transaction unique identifier.
 *
 */

$transaction = $client->transaction->timeline(2069367));

print_r($transaction);
```

## Transfer

### Create transfer

https://developer.flutterwave.com/reference#create-a-transfer
```php
/**
 * Create bank transfer
 * 
 * @since 1.0
 * 
 * @param array $details
 * 
 * $client->transfer->create(array $details);
 * 
 * @return array
 */

$transfer = $client->transfer->create(
    [
        'account_bank' => '035',
        'account_number' => '7823810197',
        'amount' => '100',
        'narration' => 'Akhlm Pstmn Trnsfr xx0090',
        'currency' => 'NGN',
        'reference' => '23tdfuyt79_6rytfhtrr645',
        'callback_url' => 'https://webhook.site/b3e505b0-fe02-430e-a538-22bbbce8ce0d',
        'debit_currency' => 'NGN',
    ]
));

print_r($transfer);
```

### Transfer retry

https://developer.flutterwave.com/reference#transfer-retry
```PHP
/**
 * Retry bank transfer
 * 
 * @since 1.0
 * 
 * @param Int $id
 * @return array
 */

$retry = $client->transfer->retry(191272);
print_r($retry);
```
### Create Bulk transfer
https://developer.flutterwave.com/reference#create-bulk-transfer
```PHP
/**
 * create bulk transfer
 * 
 * @since 1.0
 * 
 * @param array $details
 * @return array
 */
$transfers = $client->transfer->retry(array());
print($transfers);
```

### Get Transfer Fee
https://developer.flutterwave.com/reference#get-transfer-fee
```PHP
/**
 * Get transfer fee
 * 
 * @since 1.0
 *
 * @param array $details
 * @return array
 */

$fees = $client->transfer->fee([]);
print($fees);
```

### Get all transfers
https://developer.flutterwave.com/reference#get-all-transfers
```PHP
/**
 * Get all transfers
 * 
 * @since 1.0
 *
 * @return array
 */
$transfers = $client->transfer->all();
print_r($transfers);
```

### Get a transfers
https://developer.flutterwave.com/reference#get-a-transfer
```PHP
/**
 * Get a transfer
 * 
 * @since 1.0
 *
 * @param int $id
 *
 * @return array
 */
$transfer = $client->transfer->single(191112);
print_r($transfer);
```

### Get a transfer retry
https://developer.flutterwave.com/reference#get-a-transfer-retry
```PHP
/**
 * Fetch transfer retry attempts for a single transfer on your account
 * 
 * @since 1.0
 *
 * @param int $id
 *
 * @return array
 */
$retry = $client->transfer->retry_attempt(191112);
print_r($retry);
```

### Get bulk transfer 
https://developer.flutterwave.com/reference#get-a-bulk-transfer
```PHP
/**
 * Get the status of a bulk transfer on your account
 * 
 * @since 1.0
 *
 * @param int $id
 *
 * @return array
 */
$bulk = $client->transfer->get_bulk(191112);
print_r($bulk);
```

### Check transfer rate
https://developer.flutterwave.com/reference#check-transfer-rates
```PHP
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
$rate = $client->transfer->rate(1000, 'USD', 'NGN');
print_r($rate);
```
