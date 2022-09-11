<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgINnJ5l7I7uZtz6i8T000jxNouvINUrHpEb4WITWLX7NK4d3eQsvKp9nwBDttcLNwgvQ6VhQrBMx39Lzucm0SI00BE5BQV8W'
);
$product = $stripe->products->retrieve(
	'prod_MP8T8oP4IQ7fVJ',
	[]
);
$price = $stripe->prices->retrieve('price_1LgKCvJ5l7I7uZtzNa1elDDM',[]);
//echo '<pre>';
//($product);
//var_dump($price);
//echo '</pre>';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Buy</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="style.css">-->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">POCO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Stripe/my-product.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Phones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tablets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Foldables</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Other Official Stores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://www.lazada.com.ph/shop/poco-official-global-store">Lazada</a></li>
            <li><a class="dropdown-item" href="https://shopee.ph/m/poco">Shopee</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <section>
      <br>
    <div class="container">
  <div class="row">
    <div class="product col-8 text-center">
    <img src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" />
    </div>
    <div class="description col-4">
      <br><br><br><br>
      <h3><?php echo $product->name; ?></h3>
      <p><?php echo $product->description; ?></p>
      <h5><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></h5>
      <form action="/Stripe/create-checkout-session.php" method="POST">
        <button type="submit" class="btn btn-outline-dark" id="checkout-button">Checkout</button>
      </div>
    </div>
  </div>
</form>
</section>
</body>
</html>