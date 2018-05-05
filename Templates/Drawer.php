<?php

class Drawer {
    public static function getIconFilledTemplate($imgurl, $title, $price, $category, $description) {
        $template = file_get_contents("Templates/item/item_template.html");

        // Place image
        $template = str_replace("{{imgurl}}", $imgurl, $template);

        // Place Title
        $template = str_replace("{{title}}", $title, $template);

        // Place price
        $template = str_replace("{{price}}", $price, $template);

        // Place category
        $template = str_replace("{{category}}", $category, $template);

        // Place description
        $template = str_replace("{{description}}", $description, $template);

        return $template;
    }
}