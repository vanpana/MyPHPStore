<?php /** @noinspection PhpUndefinedMethodInspection */

if ((@include_once("../Util/Database.php")) === false) include_once("Util/Database.php");
if ((@include_once("../Domain/Product.php")) === false) include_once("Domain/Product.php");


class Repository
{
    public static function getAllProducts()
    {
        $products = array();

        $query = 'SELECT * FROM Products';
        $connection = Database::getConnection();

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($products, new Product($row["id"], $row["name"], $row["category"], $row["price"],
                    $row["description"], $row["image"]));
            }
        }

        return $products;
    }
}