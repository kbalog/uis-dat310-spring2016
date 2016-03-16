<?php
/**
 * This file is part of Exercise #1
 */

function is_taken($username) {
    // for now, this static array contains the usernames taken
    $usernames = array("johnsmith", "maryjane", "johndoe", "smith");

    // TODO check if username is taken and return true if it is
    return false;
}

function check_chars($username) {
    // TODO check if username contains characters other than letters or digits and return true if it is
    return false;
}

function check_username($username) {
    if (strlen($username) > 0) {
        if (strlen($username) < 3) {
            return "Username is too short";
        }
        else if (check_chars($username)) {
            return "Username may only contain letters or digits.";
        }
        else if (is_taken($username)) {
            return "Username already taken";
        }
    }
    return "";
}

$username = (isset($_GET['username'])) ? $_GET['username'] : "";
echo check_username($username);
