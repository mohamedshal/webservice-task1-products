<?php
$ch = curl_init("https://dummyjson.com/products");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);

if (!isset($data['products'])) {
    die("Invalid API response");
}

$products = $data['products'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }

        .card {
            width: 280px;
            padding: 15px;
            border-radius: 10px;
            background: #fff;
            margin: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
            vertical-align: top;
        }

        img {
            width: 100%;
            border-radius: 10px;
        }

        a {
            text-decoration: none;
            color: #4e1bbf;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h1>Product Catalog Dashboard (cURL)</h1>

<?php if (!empty($products)): ?>
    <?php foreach ($products as $p): ?>
        <div class="card">
            <a href="details.php?id=<?= $p['id'] ?>">
                <img src="<?= htmlspecialchars($p['thumbnail']) ?>" />
                <h3><?= htmlspecialchars($p['title']) ?></h3>
            </a>
            <p><?= htmlspecialchars($p['description']) ?></p>
            <p>Price: $<?= $p['price'] ?></p>
            <p>Rating: <?= $p['rating'] ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>

</body>
</html>