<?php /** @noinspection PhpIncludeInspection */

$up = "../";
$repository_path = "Repository/Repository.php";

if ((@include_once($up . $repository_path)) === false) include_once($repository_path);

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$id = $_POST['id'];

Repository::delProduct($id);
