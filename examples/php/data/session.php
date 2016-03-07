<?php
/**
 * Session example
 */

function addToSession($name, $value) {
    $_SESSION[$name] = $value;
}

function getFromSession($name) {
    echo $name . ": " . $_SESSION[$name] . "<br>";
}

// you need to start with session_start before sending anything to the browser
session_start();

// 1) first, uncomment this to store in the session
addToSession("name", "Smith");
addToSession("selection", "3");

// 2) next, comment out block 1) and uncomment block 2) to read out the values
echo "Session contents: " . "<br>";
getFromSession("name");
getFromSession("selection");

?>
