<?php
/**
 * This code illustrates MySQL usage in procedural style.
 */

$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "dat310_lectures";

// Create connection
$conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Insert record
$sql = "INSERT INTO test(name, age) VALUES ('John', 12)";
if (mysqli_query($conn, $sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Update record(s)
$sql = "UPDATE test SET age=15 WHERE name='John'";
if (mysqli_query($conn, $sql) === TRUE) {
    echo "Record(s) updated successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Query data
$sql = "SELECT name, age FROM test";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "name: " . $row['name'] . " - Age: " . $row['age']. "<br>";
    }
} else {
    echo "0 results";
}

// Disconnect
mysqli_close($conn);
