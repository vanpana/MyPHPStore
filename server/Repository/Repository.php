<?php /** @noinspection ALL */
/** @noinspection PhpUndefinedMethodInspection */

$up = "../";
$database_path = "Util/Database.php";
$product_path = "Domain/Product.php";

if ((@include_once($up . $database_path)) === false) include_once($database_path);
if ((@include_once($up . $product_path)) === false) include_once($product_path);


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

    public static function getProduct($id)
    {
        $product;

        $query = 'SELECT * FROM Products WHERE ID = ' . $id;
        $connection = Database::getConnection();

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row["id"], $row["name"], $row["category"], $row["price"],
                    $row["description"], $row["image"]);
                break;
            }
        }

        return $product;
    }

    public static function getAllCategories()
    {
        $categories = array();

        $query = 'SELECT * FROM Products';
        $connection = Database::getConnection();

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($categories, $row["category"]);
            }
        }

        return $categories;
    }
}