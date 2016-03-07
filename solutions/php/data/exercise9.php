<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #9: Registration</title>
</head>
<body>

<?php

/**
MySQL table:

CREATE TABLE `reg` (
`name` varchar(30) NOT NULL,
`username` varchar(20) NOT NULL,
`email` varchar(30) NOT NULL,
`password` varchar(80) NOT NULL
);

 */

require_once "mysql.config.php";

function display_form($message = "", $name = "", $username = "", $email = "", $password = "") {
    if ($message != "") {
        echo '<p>' . $message . '</p>';
    }
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
    <label>Name: <input type="text" name="name" value="' . $name . '"></label><br />
    <label>Username: <input type="text" name="username" value="' . $username . '"></label><br />
    <label>Email: <input type="email" name="email" value="' . $email . '"></label><br />
    <label>Password: <input type="password" name="password" value="' . $password . '"></label><br />
    <input type="hidden" name="action" value="register">
    <input type="submit" value="Register" />
</form>';
}

function salt() {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i = 0; $i < 22; $i++) {
        $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return $salt;
}

// generate hashed password using Blowfish and random salt
function get_password_hash($password) {
    return crypt($password, "$2a$07$" . salt() . "$");
}

function register_user() {
    global $db_server, $db_username, $db_password, $db_database;

    // read input variables
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // something is missing
    if ($name == "" || $username == "" || $email == "" || $password == "") {
        display_form("One or more input fields are empty", $name, $username, $email, $password);
    } // all input values are provided
    else {
        $mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

        $stmt = $mysqli->prepare("INSERT INTO reg(name, username, email, password) VALUES(?,?,?,?)");
        $stmt->bind_param('ssss', $name, $username, $email, get_password_hash($password));
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
            echo "Registration successful";
        }
        $stmt->close();
        $mysqli->close();
    }
}

if (isset($_POST['action']) && $_POST['action'] == "register") {
    register_user();
} else {
    display_form();
}

?>

</body>
</html>
