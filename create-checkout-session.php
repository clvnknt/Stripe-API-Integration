<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LgINnJ5l7I7uZtz6i8T000jxNouvINUrHpEb4WITWLX7NK4d3eQsvKp9nwBDttcLNwgvQ6VhQrBMx39Lzucm0SI00BE5BQV8W');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/Stripe';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LgKCvJ5l7I7uZtzNa1elDDM',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);