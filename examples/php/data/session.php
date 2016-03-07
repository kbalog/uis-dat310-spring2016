<?php
/**
 * Session example
 */

function addToSession($name, $value) {
    $_SESSION[$name] = $value;
}

function getFromSession($name) {
    echo $_SESSION[$name];
}

// you need to start with session_start before sending anything to the browser
session_start();

// 1) first, uncomment this to store in the session
addToSession("name", "Alex");
addToSession("selection", "3");

// 2) next, comment out block 1) and uncomment block 2) to read out the values
getFromSession("name");
getFromSession("selection");

?>
