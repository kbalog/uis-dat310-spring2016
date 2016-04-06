<?php

$placeCodes = array(
    "0107" => "Oslo",
    "0506" => "Oslo",
    "4090" => "Hafrsfjord",
    "4033" => "Stavanger",
    "4014" => "Stavanger",
    "4050" => "Sola",
    "4056" => "Tananger"
);

/* input parameter */
$postcode = $_GET['postcode'];

/* look up corresponding city, or return empty string */
if (array_key_exists($postcode, $placeCodes)) {
    echo $placeCodes[$postcode];
}
else {
    echo "";
}

?>
