<?php
/**
 * MySQL test
 */

// TODO update these values according to your settings
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "dat310_lectures";

// name of the test table
$table_test = "test";

// Create connection
$mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully<br>";

// CREATE TABLE
$sql = "CREATE TABLE " . $table_test . " (name VARCHAR(20) NOT NULL, value INT NOT NULL );";
if ($mysqli->query($sql) === TRUE) {
    echo "Table " . $table_test . " created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// INSERT
$sql = "INSERT INTO " . $table_test . "(name, value) VALUES ('John', 12), ('Mary', 23), ('Smith', 44);";
if ($mysqli->query($sql) === TRUE) {
    echo "New records inserted successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// SELECT
$sql = "SELECT name, value FROM " . $table_test;
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row['name'] . " - value: " . $row['value']. "<br>";
    }
} else {
    echo "The table is empty";
}

// Disconnect
$mysqli->close();
