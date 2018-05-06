<?php /** @noinspection PhpIncludeInspection */

$up = "../";
$repository_path = "Repository/Repository.php";

if ((@include_once($up . $repository_path)) === false) include_once($repository_path);

$categories = Repository::getAllCategories();
echo json_encode($categories);