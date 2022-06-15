<?php
require_once __DIR__ . "/Product.php";

class Cosmetics extends Product {
    public $flavour;
    public $antifleas;

    function __construct($_name, $_brand, $_description, $_price, $_antifleas = true) {
        parent::__construct($_name, $_brand, $_description, $_price);
        $this->antifleas = $_antifleas;
    }
}
