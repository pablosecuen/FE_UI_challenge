<?php
header('Content-Type: application/json');

// Ruta a los archivos de datos
$productsFile = __DIR__ . '/js/products.js';
$stockPriceFile = __DIR__ . '/js/stock-price.js';

// Obtén el SKU code desde la URL desde params 


$productsData = include($productsFile);
$stockPriceData = include($stockPriceFile);

// inicializar la respuesta
$response = ['error' => 'Producto no encontrado para SKU code: ' . $skuCode];

// Verificamos si llega un SKU por props 
if ($skuCode) {
    foreach ($productsData as $product) {
        foreach ($product['skus'] as $sku) {
            if ($sku['code'] === $skuCode) {
                $productId = $product['id'];
                $stockPrice = $stockPriceData[$skuCode] ?? ['stock' => 0, 'price' => 0];

                $response = [
                    'id' => $productId,
                    'brand' => $product['brand'],
                    'image' => $product['image'],
                    'style' => $product['style'],
                    'substyle' => $product['substyle'],
                    'abv' => $product['abv'],
                    'origin' => $product['origin'],
                    'information' => $product['information'],
                    'skus' => [
                        'code' => $sku['code'],
                        'name' => $sku['name'],
                    ],
                    'stock' => $stockPrice['stock'],
                    'price' => number_format($stockPrice['price'] / 100, 2),
                ];

                // Romper ambos bucles al matchear el SKU
                break 2;
            }
        }
    }
}

echo json_encode($response);
?>
