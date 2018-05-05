<html>
<head>
    <link rel="stylesheet" type="text/css" href="Templates/item/item.css">
    <link rel="stylesheet" type="text/css" href="Templates/item/double_items.css">
</head>

<body>
<?php
//require("Util/Database.php");
include_once("Repository/Repository.php");
include_once("Domain/Product.php");
include_once("Templates/Drawer.php");

$products = Repository::getAllProducts();

for ($index = 0; $index < count($products) - 1; $index = $index + 2) {
    $product1 = $products[$index];
    $product2 = $products[$index + 1];
    echo Drawer::getDoubleItemsFilledTemplate($product1, $product2);
}




//foreach (Repository::getAllProducts() as $product) {
//    echo Drawer::getIconFilledTemplate($product->image, $product->name, $product->price, $product->category,
//        $product->description);
//    echo "";
//}
?>
</body>
</html>
