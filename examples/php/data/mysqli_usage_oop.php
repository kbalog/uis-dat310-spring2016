<?php
/**
 * This code illustrates MySQL usage in OOP style.
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

// Insert record
$sql = "INSERT INTO test(name, age) VALUES ('John', 12)";
if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Update record(s)
$sql = "UPDATE test SET age=15 WHERE name='John'";
if ($mysqli->query($sql) === TRUE) {
    echo "Record(s) updated successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Query data
$sql = "SELECT name, age FROM test";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row['name'] . " - Age: " . $row['age']. "<br>";
    }
} else {
    echo "0 results";
}

// Disconnect
$mysqli->close();
