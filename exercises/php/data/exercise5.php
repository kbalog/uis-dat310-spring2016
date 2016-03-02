<html>
<head>
    <title>Exercise #5: Listing users from MySQL table</title>
    <style>
        td {
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Sex</th>
            </tr>
        </thead>
        <tbody>

        <?php

        // TODO update these settings
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

        // TODO complete the SQL query
        $sql = "SELECT ________ FROM users";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                // TODO complete this
                echo "</tr>";
            }
        }

        // Disconnect
        $mysqli->close();

        ?>

        </tbody>
    </table>
</body>
</html>
