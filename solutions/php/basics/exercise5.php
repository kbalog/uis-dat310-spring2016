<?php
/**
 * PHP basics Exercise #5 solution
 */

/*
The $prices array contains prices for products one can buy in a given shop.
The list of products we want to purchase (i.e., the "shopping list") is stored
in $list. This list is not ordered and the same product might be listed multiple
times (for example, we want to buy 3 apples). The list might contain items that
we cannot buy in that shop (for example, chicken).
*/

$prices = array(
    "apple" => 10,
    "banana" => 5,
    "bread" => 20,
    "milk" => 15
);

$list = array("apple", "milk", "apple", "bread", "chicken", "apple");


/*
Task A)

Complete the getItems() function to collect information about the products that
we can buy. The function should return an associative array that is indexed with
the name of the product (apple, milk, etc.) and for each product contains the
following information:
- quantity: the number of pieces to buy from the given product
- price: the unit price
- sum: quantity times unit price
For each product that is not available in the given shop, output a line with
the following text: "warning: $product is not available", where $product is the
name of the product.

For the above input values, we expect the function to return this:

Array (
	[apple] => Array (
		[quantity] => 3
		[price] => 10
		[sum] => 30 )
	[milk] => Array (
		[quantity] => 1
		[price] => 15
		[sum] => 15
	)
	[bread] => Array (
		[quantity] => 1
		[price] => 20
		[sum] => 20
	)
)

*/

function getItems($prices, $list) {
    $items = array();

    // get an array with products as keys and total counts as values
    $counts = array_count_values($list);

    foreach ($counts as $product => $qt) {
        if (array_key_exists($product, $prices)) {
            $price = $prices[$product];
            $items[$product]['quantity'] = $qt;
            $items[$product]['price'] = $price;
            $items[$product]['sum'] = $qt * $price;
        } else {
            echo "$product is not available <br>\n";
        }
    }

    return $items;
}

$items = getItems($prices, $list);
print_r($items);


/*
Task B)

Write a function that lists the maximum number of different products we can buy
from a given amount of money. Given a $money amount, list as many different
products from $prices as possible, that can be purchased from that amount.
We can buy at most one from the same product (for example, from a sum of 15,
we can buy 1 banana and 1 apple but we cannot buy 3 apples). The output should
be name and price for each product, followed by a line with the sum spent
amount at the end.
Hint: you need to order the contents of $prices by value, then iterate through
the products, starting with the cheapest.

For example, getMost($prices, 30) should output:
banana 5
apple 10
milk 15
SUM 30

*/

function getMost($prices, $money) {
    asort($prices);

    $spent = 0;
    foreach ($prices as $product => $price) {
        if ($price + $spent <= $money) {
            $spent += $price;
            echo "$product $price <br>\n";
        } else {
            break;
        }
    }
    echo "SUM $spent<br>\n";
}

getMost($prices, 30);
