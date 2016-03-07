<?php
/**
 * Cookie example
 */

function addToCookie($name, $value) {
    // expiration time is set to a month (60 sec * 60 min * 24 hours * 30 days)
    $expire = time() + 60 * 60 * 24 * 30;
    // setcookie() must be called before any output is sent to the browser
    setcookie($name, $value, $expire);
}

function getFromCookie($name) {
    echo $name . ": ";
    if (isset($_COOKIE[$name])) {
        echo $_COOKIE[$name];
    }
    else {
        echo "[not set]";
    }
    echo "<br />";
}

// 1) first, uncomment this to store in the cookie
addToCookie("name", "Alex");
addToCookie("selection", "3");

// 2) next, comment out block 1) and uncomment block 2) to read out the values
//getFromCookie("name");
//getFromCookie("selection");

?>
