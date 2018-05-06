<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My shop</title>

    <!--    css-->
    <!--    index css-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--    product css-->
    <link rel="stylesheet" type="text/css" href="Templates/item/item.css">
    <link rel="stylesheet" type="text/css" href="Templates/item/double_items.css">

    <!--    javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="Requests/getProducts.js"></script>
</head>
<body>
<div class="topnav">
    <a id="homebtn" class="active" href="#products" onclick="changeActive('homebtn')">Home</a>
    <a id="cartbtn" href="#cart" onclick="changeActive('cartbtn')">Cart</a>
</div>

<div id="products"></div>
<div id="cart"></div>
</body>
</html>