<?php

/* input parameters */
$name = (isset($_POST['name'])) ? $_POST['name'] : "";
$license = (isset($_POST['license'])) ? $_POST['license'] : "";

$valid_licenses = array(
    "Smith" => "ABC-123",
    "John Smith" => "CDE-999",
    "Mary" => "PPP-111"
);

if (array_key_exists($name, $valid_licenses) && $valid_licenses[$name] == $license) {
    echo "<img src='images/yes.png' /> Valid license key";
}
else {
    echo "<img src='images/no.png' /> Invalid license key for " . $name;
}