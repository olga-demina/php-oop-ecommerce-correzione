<?php
class Product {
    public $name;
    public $brand;
    public $description;
    public $price;

    function __construct($_name, $_brand, $_description, $_price) {
        $this->name = $_name;
        $this->brand = $_brand;
        $this->description = $_description;
        $this->price = $_price;
    }

    function printProductInfo() {
        return "$this->name. Prezzo: € $this->price";
    }
}
