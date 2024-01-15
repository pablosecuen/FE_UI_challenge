<?php

// functions.php
function beer_ecommerce_scripts() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue custom JS
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

    // Enqueue styles
    wp_enqueue_style('beer-styles', get_template_directory_uri() . '/css/styles.css');
}

add_action('wp_enqueue_scripts', 'beer_ecommerce_scripts');


function get_all_products() {

    $products_data_raw = file_get_contents(get_template_directory() . '/js/products.json');
    
    // Decodificamos el contenido en un array de PHP
    $products_array = json_decode($products_data_raw, true);

    // verificacion de exito
    if ($products_array === null && json_last_error() !== JSON_ERROR_NONE) {

        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode(array(
            'success' => false,
            'data' => array(
                'code'    => 'json_decoding_error',
                'message' => 'Error al decodificar el archivo JSON',
                'json_error' => json_last_error_msg(),
            ),
        ), JSON_PRETTY_PRINT);
        exit;
    }

    // Intentamos devolver la lista de productos en formato JSON
    header('Content-Type: application/json');
    echo json_encode(array('products' => $products_array), JSON_PRETTY_PRINT);
    exit;
}


function get_stock_price_info($request) {
    // tomamos el código SKU desde params
    $product_code = $request->get_param('code');


    if (!empty($product_code)) {

        $stock_price_data_raw = file_get_contents(get_template_directory() . '/js/stock-price.json');

        $stock_price_data = json_decode($stock_price_data_raw, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            header('Content-Type: application/json');
            http_response_code(500);
            echo json_encode(array(
                'success' => false,
                'data' => array(
                    'code'    => 'json_decoding_error',
                    'message' => 'Error al decodificar el archivo JSON de stock y precio',
                    'json_error' => json_last_error_msg(),
                ),
            ), JSON_PRETTY_PRINT);
            exit;
        }

        if (isset($stock_price_data[$product_code])) {
            $price_in_dollars = number_format($stock_price_data[$product_code]['price'] / 100, 2);

            // Construmos la respuesta solicitada en el challenge
            $response = array(
                'stock' => $stock_price_data[$product_code]['stock'],
                'price' => $price_in_dollars,
            );

            header('Content-Type: application/json');
            echo json_encode(array('success' => true, 'data' => $response), JSON_PRETTY_PRINT);
            exit;
        } else {
            // Si no se encuentra el SKU, manejamos el error
            header('Content-Type: application/json');
            http_response_code(404);
            echo json_encode(array(
                'success' => false,
                'data' => array(
                    'code'    => 'sku_not_found',
                    'message' => 'No se encontró el SKU especificado en stock-price.json',
                    'data'    => array('sku' => $product_code),
                ),
            ), JSON_PRETTY_PRINT);
            exit;
        }
    } else {
        // Si no encontramos un SKU en params, devuelve un mensaje de error
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(array(
            'success' => false,
            'data' => array(
                'code'    => 'missing_sku',
                'message' => 'Debe proporcionar un código de SKU',
            ),
        ), JSON_PRETTY_PRINT);
        exit;
    }
}


// registro de endpoints
function beer_ecommerce_api_init() {
    register_rest_route('beer_ecommerce/v1', '/products', array(
        'methods' => 'GET',
        'callback' => 'get_all_products',
    ));
    
    register_rest_route('beer_ecommerce/v1', '/stock-price/(?P<code>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_stock_price_info',
    ));

    register_rest_route('beer_ecommerce/v1', '/product/(?P<code>[\d-]+)', array(
        'methods' => 'GET',
        'callback' => 'get_product_by_sku',
    ));
    
}

add_action('rest_api_init', 'beer_ecommerce_api_init');



