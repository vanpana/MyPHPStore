<?php

class Drawer {
    public static function getIconFilledTemplate($imgurl, $title, $price, $category, $description) {
        // Get the template
        $template = file_get_contents("Templates/item/item_template.html");

        // Place image
        $template = str_replace("{{imgurl}}", $imgurl, $template);

        // Place Title
        $template = str_replace("{{title}}", $title, $template);

        // Place price
        $template = str_replace("{{price}}", '$' . $price, $template);

        // Place category
        $template = str_replace("{{category}}", $category, $template);

        // Place description
        $template = str_replace("{{description}}", $description, $template);

        return $template;
    }

    public static function getDoubleItemsFilledTemplate($item1, $item2) {
        // Get the template
        $template = file_get_contents("Templates/item/double_items_template.html");

        // Place first item
        $template = str_replace("{{item1}}", self::getIconFilledTemplate($item1->image, $item1->name,
            $item1->price, $item1->category, $item1->description), $template);

        // Place second item
        $template = str_replace("{{item2}}", self::getIconFilledTemplate($item2->image, $item2->name,
            $item2->price, $item2->category, $item2->description), $template);

        return $template;
    }
}