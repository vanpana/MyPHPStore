<?php
include_once("Drawer.php");

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$products = json_decode($_POST['products']);
if (isset($_POST['startIndex']))
    $startIndex = $_POST['startIndex'];
else $startIndex = 0;

$data = "";

if ($startIndex >= count($products)) $data = "";
else {
    if ($startIndex + 4 >= count($products)) $endIndex = count($products);
    else $endIndex = $startIndex + 4;

    for ($index = $startIndex; $index < $endIndex - 1; $index = $index + 2) {
        $product1 = $products[$index];
        $product2 = $products[$index + 1];
        $data = $data . Drawer::getDoubleItemsFilledTemplate($product1, $product2);
    }

    $diff = $endIndex - $startIndex;
    if ($diff < 4 && $diff % 2 == 1) $data = $data . Drawer::getSingleItemFilledTemplate($products[$endIndex - 1]);
}

echo $data;