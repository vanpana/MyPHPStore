window.onload = function() {
    console.log("Requesting");

    $.get("../server/Endpoints/getAllProducts.php",
        function (data, status) {
            alert(data + " " + status)
        });
};