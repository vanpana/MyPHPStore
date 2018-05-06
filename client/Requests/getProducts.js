window.onload = function () {
    drawProducts();
};

window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {

        const dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

function drawProducts() {
    $.get("../server/Endpoints/getAllProducts.php",
        function (data, status) {
            if (status === "success") {
                jQuery.ajax({
                    type: "POST",
                    data: {products: data},
                    url: "Templates/drawDoubleProducts.php",
                    dataType: 'text',
                    success: function (data, status) {
                        if (status === "success")
                            $("#mainArea").html(data);
                    }
                });
            }
        });
}

function drawProductPageByIndex(startIndex) {

}

function getProductByIndex(index) {

}

function showDropdown() {
    $.get("../server/Endpoints/getAllCategories.php",
        function (data, status) {
            if (status === "success") {
                console.log(status);
                console.log(data);

                jQuery.ajax({
                    type: "POST",
                    data: {categories: data},
                    url: "Templates/drawSpinner.php",
                    dataType: 'text',
                    success: function (data, status) {

                        if (status === "success")
                            $("#dropdownValues").html(data);
                    }
                });
            }
        });

    document.getElementById("dropdownValues").classList.toggle("show");
}

function drawCategory(category) {
    $.post("../server/Endpoints/getProductsByCategory.php", {category: category},
        function (data, status) {
            console.log(JSON.stringify(data));
            if (status === "success") {
                jQuery.ajax({
                    type: "POST",
                    data: {products: JSON.stringify(data) },
                    url: "Templates/drawDoubleProducts.php",
                    dataType: 'text',
                    success: function (data, status) {
                        console.log(status);
                        console.log(data);
                        if (status === "success")
                            $("#mainArea").html(data);
                    }
                });
            }
        });
}

function showCart() {
    $.post("../server/Endpoints/getProductsById.php", {products: getCookie("cart")},
        function (data, status) {
            if (status === "success") {
                jQuery.ajax({
                    type: "POST",
                    data: {products: JSON.stringify(data)},
                    url: "Templates/drawCart.php",
                    dataType: 'text',
                    success: function (data, status) {
                        if (status === "success") {
                            $("#mainArea").html(data);
                        }
                    }
                });
            }
        });
}

function addToCart(index) {
    let cartCookieJSON = getCookie("cart");
    var cartList;

    if (cartCookieJSON === "") {
        cartList = [];
        cartList.push(index);
    } else {
        cartList = JSON.parse(cartCookieJSON);
        cartList.push(index);
    }
    setCookie("cart", JSON.stringify(cartList), 30);
}

function deleteFromCart(index) {
    let cartCookieJSON = getCookie("cart");
    var cartList;

    if (cartCookieJSON === "") {
        cartList = [];
    } else {
        cartList = JSON.parse(cartCookieJSON);
        cartList.splice(index, 1);
    }
    setCookie("cart", JSON.stringify(cartList), 30);

    showCart();
}

function changeActive(tab) {
    document.getElementById("homebtn").classList.remove('active');
    document.getElementById("cartbtn").classList.remove('active');

    document.getElementById(tab).classList.add('active');

    if (tab === "homebtn") drawProducts();
    else showCart();
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}