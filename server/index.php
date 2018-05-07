<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="actions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
</head>

<body>
<div class="dropdown">
    <button onclick="showDropdown()" class="dropbtn">Dropdown</button>
    <div id="dropdownValues" class="dropdown-content">
        <a onclick="showPage('none')">None</a>
        <a onclick="showPage('add')">Add</a>
        <a onclick="showPage('update')">Update</a>
        <a onclick="showPage('delete')">Delete</a>
    </div>
</div>

<div id="inputArea"></div>

<div id="mainArea">

</div>
</body>
</html>
