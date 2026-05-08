<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->get("https://dummyjson.com/products");

$data = json_decode($response->getBody(), true);
$products = $data['products'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
</head>
<body>
<h1>Product Catalog Dashboard (Guzzle)</h1>

<?php foreach ($products as $p): ?>
    <div class="card">
        <a href="details-guzzle.php?id=<?= $p['id'] ?>">
            <img src="<?= $p['thumbnail'] ?>" />
            <h3><?= $p['title'] ?></h3>
        </a>
        <p><?= $p['description'] ?></p>
        <p>Price: $<?= $p['price'] ?></p>
        <p>Rating: <?= $p['rating'] ?></p>
    </div>
<?php endforeach; ?>

</body>
</html>