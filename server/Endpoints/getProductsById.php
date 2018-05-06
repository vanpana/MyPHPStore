<?php /** @noinspection PhpIncludeInspection */

$up = "../";
$repository_path = "Repository/Repository.php";

if ((@include_once($up . $repository_path)) === false) include_once($repository_path);

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$productIndexes = json_decode($_POST['products']);

$data = array();

for ($index = 0; $index < count($productIndexes); $index++) {

    $product = Repository::getProduct($productIndexes[$index]);
    array_push($data, $product);
}

echo json_encode($data);