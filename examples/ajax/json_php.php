<?php
/**
 * JSON example
 */

$data = array(
    "name" => "John Smith",
    "age" => 32,
    "married" => true,
    "interests" => array(1, 2, 3),
    "other" => array(
        "city" => "Stavanger",
        "postcode" => 4041
    )
);

// encode
$json = json_encode($data);
echo $json;

// decode
$data2 = json_decode($json, true);
print_r($data2);
