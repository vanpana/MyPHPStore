var currentCategory = "all";

window.onload = function () {
    drawProducts(0);
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

function drawProducts(index) {
    $.get("../server/Endpoints/getAllProducts.php",
        function (data, status) {
            if (status === "success") {
                jQuery.ajax({
                    type: "POST",
                    data: {products: data, startIndex: index},
                    url: "Templates/drawDoubleProducts.php",
                    dataType: 'text',
                    success: function (data, status) {
                        if (status === "success" && data !== "") {
                            $("#mainArea").html(data);
                            setCurrentPageIndex(index);

                            setNextButtonVisibility(true);
                            setPrevButtonVisibility(true);
                        } else if (data === "") {
                            if (getCurrentPageIndex() < index) setNextButtonVisibility(false);
                            if (getCurrentPageIndex() > index) setPrevButtonVisibility(false);
                        }
                    },
                });
            }
        });
}

function showDropdown() {
    $.get("../server/Endpoints/getAllCategories.php",
        function (data, status) {
            if (status === "success") {
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
    currentCategory = category;

    return drawCategoryPage(0, category)
}

function drawCategoryPage(index, category) {
    if (category === "all") return drawProducts(index);
    else {
        $.post("../server/Endpoints/getProductsByCategory.php", {category: category},
            function (data, status) {
                if (status === "success") {
                    jQuery.ajax({
                        type: "POST",
                        data: {products: JSON.stringify(data), startIndex: index},
                        url: "Templates/drawDoubleProducts.php",
                        dataType: 'text',
                        success: function (data, status) {
                            if (status === "success" && data !== "") {
                                $("#mainArea").html(data);
                                setCurrentPageIndex(index);

                                setNextButtonVisibility(true);
                                setPrevButtonVisibility(true);
                            } else if (data === "") {
                                if (getCurrentPageIndex() < index) setNextButtonVisibility(false);
                                if (getCurrentPageIndex() > index) setPrevButtonVisibility(false);
                            }
                            return false
                        }
                    });
                }
            });
    }
}

function getCurrentPageIndex() {
    const clickFunction = document.getElementById("nextbtn").getAttribute("onclick");
    return parseInt(clickFunction.substring(clickFunction.indexOf("(") + 1, clickFunction.indexOf(")")));
}

function setCurrentPageIndex(index) {
    document.getElementById("nextbtn").setAttribute("onclick", "nextPage(" + index + ")");
    document.getElementById("prevbtn").setAttribute("onclick", "prevPage(" + index + ")");
}

function setNextButtonVisibility(status) {
    if (status === true) document.getElementById("nextbtn").style.visibility = "visible";
    else document.getElementById("nextbtn").style.visibility = "hidden";
}

function setPrevButtonVisibility(status) {
    if (status === true) document.getElementById("prevbtn").style.visibility = "visible";
    else document.getElementById("prevbtn").style.visibility = "hidden";
}

function nextPage(index) {
    let currentIndex = index + 4;
    drawCategoryPage(currentIndex, currentCategory);
}

function prevPage(index) {
    var currentIndex;
    if (index - 4 < 0) {
        setCurrentPageIndex(0);
        setPrevButtonVisibility(false);
    }
    else {
        currentIndex = index - 4;
        drawCategoryPage(currentIndex, currentCategory);
    }

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