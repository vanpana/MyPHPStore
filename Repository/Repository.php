<?php /** @noinspection PhpUndefinedMethodInspection */

//require("../Util/Database.php");


class Repository
{
    public static function getAllProducts()
    {
        $query = 'SELECT * FROM Products';
        $connection = Database::getConnection();

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["description"] . "<br>";
            }
        } else echo "No results";
    }
}