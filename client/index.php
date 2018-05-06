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
    <a id="homebtn" class="active" onclick="changeActive('homebtn')">Home</a>
    <a id="cartbtn" onclick="changeActive('cartbtn')">Cart</a>
</div>

<div class="dropdown">
    <button onclick="showDropdown()" class="dropbtn">Dropdown</button>
    <div id="dropdownValues" class="dropdown-content"></div>
</div>
<div id="mainArea"></div>
</body>
</html>