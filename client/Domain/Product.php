<?php

class Product
{
    public $id, $name, $category, $price, $description, $image;

    public function __construct($id, $name, $category, $price, $description, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }




}