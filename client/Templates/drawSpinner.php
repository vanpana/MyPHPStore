<?php
// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-Type: application/json; charset=UTF-8');

$duplicateCategories = json_decode($_POST['categories']);

$categories = array();

foreach ($duplicateCategories as $category) {
    if (!in_array($category, $categories, true)) array_push($categories, $category);
}

$data = "";

for ($index = 0; $index < count($categories); $index++) {
    $category = $categories[$index];

    $data = $data ."<a onclick=\"drawCategory('" . strtolower($category) ."')\">" . ucfirst($category) . "</a>\n";
}

echo $data;