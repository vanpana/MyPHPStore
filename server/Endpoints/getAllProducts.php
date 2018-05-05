<?php

try {
    include("../Repository/Repository.php");
} catch (Exception $exception) {
    include("Repository/Repository.php");
}

$products = Repository::getAllProducts();
echo json_encode($products);