<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
    'sk_test_51LgINnJ5l7I7uZtz6i8T000jxNouvINUrHpEb4WITWLX7NK4d3eQsvKp9nwBDttcLNwgvQ6VhQrBMx39Lzucm0SI00BE5BQV8W'
  );
  $result = $stripe->products->retrieve(
    'prod_MP7pol0fYYedix',
    []
  );
  var_dump($result);
?>