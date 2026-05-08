<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$id = $_GET['id'];

$response = $client->get("https://dummyjson.com/products/$id");
$product = json_decode($response->getBody(), true);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $product['title'] ?></title>
</head>
<body>

<a href="products-guzzle.php">← Back to Products</a>

<div>
    <img src="<?= $product['thumbnail'] ?>" />
    <h1><?= $product['title'] ?></h1>
    <p><?= $product['description'] ?></p>
    <p>Price: $<?= $product['price'] ?></p>
    <p>Discount: <?= $product['discountPercentage'] ?>%</p>
    <p>Rating: <?= $product['rating'] ?>/5</p>
    <p>Stock: <?= $product['stock'] ?></p>
    <p>Brand: <?= $product['brand'] ?></p>
    <p>Category: <?= $product['category'] ?></p>
</div>

</body>
</html>