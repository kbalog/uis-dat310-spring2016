<?php
/**
 * Exercise #8: Shopping cart
 */

class ShoppingCart {

    private $products;

    function __construct() {
        // initialize the products session variable
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = array();
        }
    }

    function addProduct($product_id, $qt) {
        echo "Adding " . $product_id . " x " . $qt . "<br>";
        // TODO
    }

    function removeProduct($product_id) {
        echo "Removing " . $product_id . "<br>";
        // TODO
    }

    function listProducts() {
        echo "Listing products" . "<br>";
        // TODO
    }

}

// init session
session_start();

// Testing
$sh = new ShoppingCart();
$sh->addProduct("123", 2);
$sh->addProduct("345", 1);
$sh->addProduct("678", 1);
$sh->removeProduct("345");
$sh->listProducts();
