<?php

class Product
{
    public $name, $category, $price, $description;

    public function __construct($name, $category, $price, $description){
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->description = $description;
    }
}