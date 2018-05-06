<?php
include_once ("Drawer.php");

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$products = json_decode($_POST['products']);

$data = "";

for ($index = 0; $index < count($products) - 1; $index = $index + 2) {

    $product1 = $products[$index];
    $product2 = $products[$index + 1];
    $data = $data . Drawer::getDoubleItemsFilledTemplate($product1, $product2);
}

echo $data;