<html>
<head>
    <link rel="stylesheet" type="text/css" href="Templates/item/item.css">
</head>

<body>
<p>Hello world!</p>

<?php
require("Util/Database.php");
require("Repository/Repository.php");
require("Domain/Product.php");
require("Templates/Drawer.php");

foreach (Repository::getAllProducts() as $product) {
    echo Drawer::getIconFilledTemplate($product->image, $product->name, $product->price, $product->category,
        $product->description);
}
?>
</body>
</html>
