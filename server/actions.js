window.onload = function () {
    showPage('none');
    loadProducts();
};

function showDropdown() {
    document.getElementById("dropdownValues").classList.toggle("show");
}

function loadProducts() {
    $.get("loadProducts.php",
        function (data, success) {
            if (success === "success")
                $("#mainArea").html(data);
            console.log("loaded products!");
        });
}

function showPage(pageName) {
    if (pageName === "none") $("#inputArea").html("");

    if (pageName === "add")
        $.get("Templates/add.php",
            function (data, success) {
                if (success === "success")
                    $("#inputArea").html(data);
            });

    if (pageName === "update")
        $.get("Templates/update.php",
            function (data, success) {
                if (success === "success")
                    $("#inputArea").html(data);
            });

    if (pageName === "delete")
        $.get("Templates/delete.php",
            function (data, success) {
                if (success === "success")
                    $("#inputArea").html(data);
            });
}

// ====
function add() {
    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;
    const category = document.getElementById("category").value;
    const description = document.getElementById("description").value;
    const imageURL = document.getElementById("image").value;

    if (name === "" || price === "" || category === "" || description === "" || imageURL === "")
        alert("Inputs can't be empty!");
    else {
        jQuery.ajax({
            type: "POST",
            data: {name: name, price: price, category: category, description: description, imageURL: imageURL},
            url: "Endpoints/addProduct.php",
            dataType: 'text',
            success: function () {
                loadProducts();
            }
        });
    }
}

function upd() {
    const id = document.getElementById("id").value;
    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;
    const category = document.getElementById("category").value;
    const description = document.getElementById("description").value;
    const imageURL = document.getElementById("image").value;

    if (id === "" || name === "" || price === "" || category === "" || description === "" || imageURL === "")
        alert("Inputs can't be empty!");
    else {
        jQuery.ajax({
            type: "POST",
            data: {id: id, name: name, price: price, category: category, description: description, imageURL: imageURL},
            url: "Endpoints/updateProduct.php",
            dataType: 'text',
            success: function () {
                loadProducts();
            }
        });
    }
}

function del() {
    const id = document.getElementById("id").value;

    if (id === "") alert("Inputs can't be empty!");

    else {
        jQuery.ajax({
            type: "POST",
            data: {id: id},
            url: "Endpoints/deleteProduct.php",
            dataType: 'text',
            success: function () {
                loadProducts();
            }
        });
    }
}