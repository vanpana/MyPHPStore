window.onload = function () {
    drawProducts();
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
                            $("#products").html(data);
                    }
                });
            }
        });
}

function drawProductsByIndex(startIndex) {

}

function addToCart(index) {
    let cartCookieJSON = getCookie("cart");
    console.log(cartCookieJSON);
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

function changeActive(tab) {
    document.getElementById("homebtn").classList.remove('active');
    document.getElementById("cartbtn").classList.remove('active');

    document.getElementById(tab).classList.add('active');
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    const name = cname + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
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