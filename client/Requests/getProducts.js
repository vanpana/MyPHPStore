window.onload = function () {
    $.get("../server/Endpoints/getAllProducts.php",
        function (data, status) {
            if (status === "success") {
                jQuery.ajax({
                    type: "POST",
                    data: { products: data},
                    url: "Templates/drawDoubleProducts.php",
                    dataType: 'text',
                    success: function (data, status) {
                        if (status === "success")
                            $("#products").html(data);
                    }
                });
            }
        });
};