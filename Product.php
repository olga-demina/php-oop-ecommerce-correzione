<?php
class Product {
    public $name;
    public $brand;
    public $description;
    public $price;
    public $available;

    function __construct($_name, $_brand, $_description, $_price, $_available = true) {
        $this->name = $_name;
        $this->brand = $_brand;
        $this->description = $_description;
        $this->price = $_price;
        $this->available = $_available;
    }

    function printProductInfo() {
        return "$this->name. Prezzo: € $this->price";
    }
}
