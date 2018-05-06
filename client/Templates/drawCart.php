<?php

include_once ("Drawer.php");

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$products = json_decode($_POST['products']);

$data = "";
$total_cost = 0;

for ($index = 0; $index < count($products); $index++) {

    $product = $products[$index];
    $total_cost = $total_cost + $product->price;
    $data = $data . Drawer::getCartFilledTemplate($index, $product->name, $product->price);
}

if ($total_cost > 0)
    $data = $data . "<p>Total price = $" . $total_cost . "</p>";
else $data = $data . "<p>The cart is empty, but it doesn't need to be!</p>";

echo $data;