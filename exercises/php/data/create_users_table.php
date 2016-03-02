<?php
/**
 * MySQL test
 */

// TODO update these values according to your settings
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

// CREATE TABLE
$sql = "CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('male','female') NOT NULL
) DEFAULT CHARSET=utf8;";

if ($mysqli->query($sql) === TRUE) {
    echo "Table users created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Disconnect
$mysqli->close();
