<?php /** @noinspection ALL */
/** @noinspection PhpUndefinedMethodInspection */

$up = "../";
$database_path = "Util/Database.php";
$product_path = "Domain/Product.php";

if ((@include_once($up . $database_path)) === false) include_once($database_path);
if ((@include_once($up . $product_path)) === false) include_once($product_path);


class Repository
{
    public static function addProduct($name, $category, $price, $description, $image)
    {
        $query = "INSERT INTO Products (name, category, price, description, image) VALUES ('{$name}', '{$category}', 
          {$price}, '{$description}', '{$image}')";

        $connection = Database::getConnection();

        if ($connection->query($query) === TRUE) {
            echo "Success!";
        } else echo "Failure!";
    }

    public static function delProduct($id)
    {
        $query = "DELETE FROM Products WHERE id = " . $id;

        $connection = Database::getConnection();

        if ($connection->query($query) === TRUE) {
            echo "Success!";
        } else echo "Failure!";
    }

    public static function updateProduct($id, $name, $category, $price, $description, $image)
    {
        $query = "UPDATE Products set name = '{$name}', category = '{$category}', price = {$price},
          description = '{$description}', image = '{$image}' where id = {$id}";

        $connection = Database::getConnection();

        if ($connection->query($query) === TRUE) {
            echo "Success!";
        } else echo "Failure!";
    }

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

    public static function getProductsByCategory($category)
    {
        $products = array();

        $query = 'SELECT * FROM Products WHERE category = \'' . $category . '\'';
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