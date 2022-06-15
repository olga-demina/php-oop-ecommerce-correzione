<?php
require_once __DIR__ . "/Product.php";

class Food extends Product {

    public $weight_g;
    public $flavour;

    function __construct($_name, $_brand, $_description, $_price, $_weight_g, $_flavour) {
        parent::__construct($_name, $_brand, $_description, $_price);
        $this->weight_g = $_weight_g;
        $this->flavour = $_flavour;
    }
}
