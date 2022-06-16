<?php
require_once __DIR__ . "/Authentication.php";

class Supplier {
    use Authentication;
    
    public $vat_number;
    public $supplier_name;
    public $average_vote;

    public $products_catalog = [];
}