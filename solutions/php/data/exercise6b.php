<html>
<head>
    <title>Exercise #6b: Listing users from MySQL table</title>
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

        // SELECT using prepared statements
        $stmt = $mysqli->prepare("SELECT name, email, date_of_birth, sex FROM users");
        // NOTE: there are no parameters to bind here
        // bind result variables
        $stmt->bind_result($name, $email, $date_of_birth, $sex);
        $stmt->execute();

        // iterate results
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $date_of_birth . "</td>";
            echo "<td>" . $sex . "</td>";
            echo "</tr>";
        }
        $stmt->close();

        // Disconnect
        $mysqli->close();

        ?>

        </tbody>
    </table>
</body>
</html>
