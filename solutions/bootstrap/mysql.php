<?php
/**
 * MySQL operations for Exercise #10
 */

$db_server = "localhost";
$db_username = "root";
$db_password = "root"; // update it according to your local settings
$db_database = "dat310_lectures"; // update it according to your local settings

// Create connection
$mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// get the total count of records
function get_count_total() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT COUNT(*) AS num FROM countries");
    $stmt->bind_result($num);
    $stmt->execute();

    $count = 0;
    if ($stmt->fetch()) {
        $count = $num;
    }
    $stmt->close();
    return $count;
}

// get the count of matching records
function get_count_filtered() {
    // since we do not support search (filtering), this will be the same as the total # of records
    return get_count_total();
}

// get all matching records
function get_data($start, $length, $order_by, $order_dir) {
    global $mysqli;

    // ORDER BY needs to be added here, doesn't work with bind_param
    $stmt = $mysqli->prepare("SELECT Code, Name, Continent, Capital, Population FROM countries ORDER BY "
                            . $order_by . " " . $order_dir . " LIMIT ?,?");
    // bind parameters
    $stmt->bind_param("ii", $start, $length);
    // bind result variables
    $stmt->bind_result($code, $name, $cont, $cap, $pop);
    $stmt->execute();

    // iterate results
    $data = array();
    while ($stmt->fetch()) {
        $data[] = array($code, $name, $cont, $cap, $pop);
    }
    $stmt->close();

    return $data;
}


