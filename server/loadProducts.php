<?php
require_once("Repository/Repository.php");

foreach (Repository::getAllProducts() as $product) {
    echo "<p>{$product->id}: {$product->name}, {$product->price}, {$product->description}, {$product->category}</p>\n";
}
