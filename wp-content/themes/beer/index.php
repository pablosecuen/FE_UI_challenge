<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php

    $products = [
        [
            'brand' => 'Example Brand 1',
            'image' => '/path/to/image1.jpg',
            'style' => 'Example Style 1',
            'substyle' => 'Example Substyle 1',
            'abv' => '5.0%',
            'origin' => 'Example Origin 1',
            'information' => 'Example Information 1',
            'skus' => [
                ['code' => '101', 'name' => 'SKU 1'],
                ['code' => '102', 'name' => 'SKU 2'],
            ],
        ],
        [
            'brand' => 'Example Brand 2',
            'image' => '/path/to/image2.jpg',
            'style' => 'Example Style 2',
            'substyle' => 'Example Substyle 2',
            'abv' => '4.5%',
            'origin' => 'Example Origin 2',
            'information' => 'Example Information 2',
            'skus' => [
                ['code' => '201', 'name' => 'SKU 3'],
                ['code' => '202', 'name' => 'SKU 4'],
            ],
        ],
    ];


    foreach ($products as $product) {
        echo '
        <div class="product-card">
            <img src="' . $product['image'] . '" alt="' . $product['brand'] . '">
            <h2>' . $product['brand'] . '</h2>
            <p>' . $product['style'] . ' - ' . $product['substyle'] . '</p>
            <p>ABV: ' . $product['abv'] . '</p>
            <p>Origin: ' . $product['origin'] . '</p>
            <p>' . $product['information'] . '</p>
            
            <div>
                <h3>Available SKUs:</h3>
                <ul>';
                    foreach ($product['skus'] as $sku) {
                        echo '<li>' . $sku['name'] . ' (Code: ' . $sku['code'] . ')</li>';
                    }
                echo '
                </ul>
            </div>
        </div>
        ';
    }
    ?>
</body>
</html>
