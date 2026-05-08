<?php
$id = $_GET['id'];

$ch = curl_init("https://dummyjson.com/products/$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$product = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $product['title'] ?></title>
    <style>
        .container { width: 60%; margin: 40px auto; padding: 20px;
                     border-radius: 12px; box-shadow: 0 0 15px rgba(0,0,0,0.1); background: #fff; }
        img { width: 150px; }
    </style>
</head>
<body>

<a href="products.php">← Back to Products</a>

<div class="container">
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