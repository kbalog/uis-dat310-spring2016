<?php
/**
 * This code illustrates the usage of prepared statements in OOP style.
 */

$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "dat310_lectures";

// Create connection
$mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully<br>";


// UPDATE using prepared statements
$stmt = $mysqli->prepare("UPDATE test SET age=? WHERE name=?");
// bind parameters
$age = 14;
$name = "John";
$stmt->bind_param('is', $age, $name);
$stmt->execute();
$res = $stmt->affected_rows;
echo $res . " rows updated";
$stmt->close();

// SELECT using prepared statements
$stmt = $mysqli->prepare("SELECT name, age FROM test WHERE age>=?");
// bind parameters
$minage = 14;
$stmt->bind_param("i", $minage);
// bind result variables
$stmt->bind_result($name, $age);
$stmt->execute();

// iterate results
while ($stmt->fetch()) {
    echo $name . ": " . $age . "<br>";
}
$stmt->close();

// Disconnect
$mysqli->close();
