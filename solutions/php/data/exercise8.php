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
        $old_qt = 0;
        if (array_key_exists($product_id, $_SESSION['products'])) {
            $old_qt = $_SESSION['products'][$product_id];
        }
        $_SESSION['products'][$product_id] = $old_qt + $qt;
    }

    function removeProduct($product_id) {
        echo "Removing " . $product_id . "<br>";
        if (array_key_exists($product_id, $_SESSION['products'])) {
            unset($_SESSION['products'][$product_id]);
        }
    }

    function listProducts() {
        echo "Listing products" . "<br>";
        foreach ($_SESSION['products'] as $product_id => $qt) {
            echo $product_id . " x " . $qt . "<br>";
        }
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
