<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #4: Saving users to MySQL table</title>
    <style>
        div {
            margin-bottom: 5px;
            padding: 3px;
            width: 400px;
        }
        .error {
            background-color: #ffcccc;
            color: red;
        }
        .small {
            font-size: 0.8em;
        }
    </style>
</head>
<body>

<?php

require("reg.inc.php");

// TODO update these settings
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "dat310_lectures";

function save_to_mysql($name, $email, $year, $month, $day, $sex) {
    global $db_server, $db_username, $db_password, $db_database;

    // Create connection
    $mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Insert record
    $sql = "INSERT INTO users(name, email, date_of_birth, sex) VALUES ('" . $name . "', '". $email
        . "', '" . $year . "-". $month . "-" . $day . "', '" . $sex . "')";
    if ($mysqli->query($sql) !== true) {
        die("MySQL error");
    }

    // Disconnect
    $mysqli->close();
}

// read in form values
$name = get_value_post("name");
$email = get_value_post("email");
$year = get_value_post("year");
$month = get_value_post("month");
$day = get_value_post("day");
$sex = get_value_post("sex");
$terms = get_value_post("terms");

// check if the form has been submitted -- any of the input values is set
$submitted = isset($_POST['name']);

if ($submitted) {
    // check for errors
    $errors = input_check($name, $email, $year, $month, $day, $sex, $terms);

    if (count($errors) > 0) {
        display_form($name, $email, $year, $month, $day, $sex, $terms, $errors);
    }
    else {
        confirm($name, $email, $year, $month, $day, $sex);
        save_to_mysql($name, $email, $year, $month, $day, $sex);
    }
}
else {
    // display form for the first time
    display_form();
}

?>

</body>
</html>