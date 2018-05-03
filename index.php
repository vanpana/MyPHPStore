<html>
<body>
<p>Hello world!</p>

<?php
require("Util/Database.php");

$connection = Database::getConnection();
echo '<p>'.$connection.'</p>';
?>
</body>
</html>
