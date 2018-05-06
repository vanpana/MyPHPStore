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
    alert("Bought product with id: " + index);
}

function changeActive(tab) {
    document.getElementById("homebtn").classList.remove('active');
    document.getElementById("cartbtn").classList.remove('active');

    document.getElementById(tab).classList.add('active');
}