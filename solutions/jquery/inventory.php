<?php
/**
 * This file is part of jQuery Exercise #9
 */

// we store the data indexed by item_id
$items = array(
    '001' => array(
        'name' => "iPhone 5",
        'brand' => "Apple",
        'size_x' => 5,
        'size_y' => 7,
        'size_z' => 2,
        'price' => 2000,
        'available' => true
    ),
    '123' => array(
        'name' => "Test item",
        'brand' => "CompanyX",
        'size_x' => 11,
        'size_y' => 22,
        'size_z' => 33,
        'price' => 1000,
        'available' => false
    ),
    '999' => array(
        'name' => "Test item 2",
        'brand' => "CompanyY",
        'size_x' => 33,
        'size_y' => 22,
        'size_z' => 11,
        'price' => 500,
        'available' => true
    )
);

$item_id = (isset($_GET['item_id'])) ? $_GET['item_id'] : "";
if (strlen($item_id) == 3) {
    if (array_key_exists($item_id, $items)) {
        // return item data as JSON
        echo json_encode($items[$item_id]);
    }
}
