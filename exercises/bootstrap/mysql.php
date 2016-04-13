<?php
/**
 * Creating MySQL connection
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
function get_count_filtered($start, $length, $order_by, $order_dir) {
    global $mysqli;

    // TODO
    return 0;
}

// get all matching records
function get_data($start, $length, $order_by, $order_dir) {
    global $mysqli;

    // TODO
    return array();
}


