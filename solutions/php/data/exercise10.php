<?php
/**
 * Exercise #10: Login
 */

// make sure errors are displayed
ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once "mysql.config.php";

// Display login form
function loginForm() {
    echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>"
    . "<label>Username: <input type='text' name='username'></label><br />"
    . "<label>Password: <input type='password' name='password'></label><br />"
    . "<input type='hidden' name='action' value='login' />"
    . "<input type='submit' name='submit' value='Login' />"
    . "</form>";
}

// Logs in the user and returns 0 if successful or -1 otherwise
function login($username, $password_entered) {
    global $db_server, $db_username, $db_password, $db_database;

    $mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);

    $stmt = $mysqli->prepare("SELECT name, email, password FROM reg WHERE username=?");
    // bind parameters
    $stmt->bind_param("s", $username);
    // bind result variables
    $stmt->bind_result($name, $email, $password_hash);
    $stmt->execute();
    // get result (zero or one row)
    if (!$stmt->fetch()) {
        $password_hash = null;
    }
    $stmt->close();
    $mysqli->close();

    if ($password_hash != null && crypt($password_entered, $password_hash) == $password_hash) {
        $_SESSION['name'] = $name;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        return 0;
    }
    return -1;
}

function logout() {
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
    if (isset($_SESSION['name'])) {
        unset($_SESSION['name']);
    }
    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
}

session_start();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

switch ($action) {
    
    case "login":
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $error = null;
        if (isset($username) && isset($password)) {
            if (login($username, $password) == -1) {
                $error = "Incorrect username/password.";
            }
        } else {
            $error = "Username or password is empty.";
        }
        if (isset($error)) {
            echo $error . " Try again!<br />";
        }
        break;

    case "logout":
        logout();
        break;
}

// user is logged in
if (isset($_SESSION['username'])) {
    echo "Name: " . $_SESSION['name'] . "<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br><br>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?action=logout'>Logout</a>";
}
// login form
else {
    loginForm();
}

