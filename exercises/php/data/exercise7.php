<?php
/**
 * Exercise #7: Login using cookies
 */

// make sure errors are displayed
ini_set("display_errors", 1);
error_reporting(E_ALL);

// this is our "user database"
// the key is the username
$user_ids = array(
    'user_1' => 1,
    'user_2' => 2,
    'user_123' => 123,
);
// key is the user_id
$users = array(
    1 => array('username' => "user_1", 'name' => "John Smith 1", 'password' => "aaa"),
    2 => array('username' => "user_2", 'name' => "John Smith 2", 'password' => "bbb"),
    123 => array('username' => "user_123", 'name' => "John Smith 123", 'password' => "ccc"),
);


// stores a value in the cookie
function addToCookie($name, $value) {
    $expire = time() + 60 * 60 * 24 * 30;
    setcookie($name, $value, $expire);
}

// unset a value in the cookie
function unsetCookie($name) {
    $expire = time() - 3600;
    setcookie($name, "", $expire);
}

// display login form
function loginForm() {
    echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>"
    . "<label>Username: <input type='text' name='username'></label><br />"
    . "<label>Password: <input type='password' name='password'></label><br />"
    . "<input type='hidden' name='action' value='login' />"
    . "<input type='submit' name='submit' value='Login' />"
    . "</form>";
}

// Checks if the password belongs to the given user.
// If yes, returns the user_id, otherwise returns -1
function checkPassword($username, $password) {
    global $user_ids, $users;
    if (isset($user_ids[$username]) && $users[$user_ids[$username]]['password'] == $password) {
        return $user_ids[$username];
    }
    return -1;
}

// Returns user_id if there is a logged in user, and -1 otherwise
function loggedInUser() {
    if (isset($_COOKIE['user_id'])) {
        return $_COOKIE['user_id'];
    }
    return -1;
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

switch ($action) {
    
    case "login":
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $error = null;
        if (isset($username) && isset($password)) {
            $user_id = checkPassword($username, $password);
            if ($user_id == -1) {
                $error = "Incorrect username/password.";
            } else {
                addToCookie("user_id", $user_id);
            }
        } else {
            $error = "Username or password is empty.";
        }
        if (isset($error)) {
            echo $error . " Try again!<br />";
        }
        break;

    case "logout":
        unsetCookie("user_id");
        $user_id = -1;
        break;
    
    default:
        $user_id = loggedInUser();
}

// user is logged in
if ($user_id > 0) {
    echo "Hello " . $users[$user_id]['name'] . "! <br />";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?action=logout'>Logout</a>";
}
// login form
else {
    loginForm();
}

