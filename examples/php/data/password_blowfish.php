<?php
/**
 * Generating hashed password using blowfish and random salt
 */

function salt() {
    $salt = "";
    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
    for($i = 0; $i < 22; $i++) {
        $salt .= $salt_chars[array_rand($salt_chars)];
    }
    return $salt;
}

// generate password hash (one-time, at registration)
$password_entered = "123"; // needs to be read from user input
$password_hash = crypt($password_entered, "$2a$07$" . salt() . "$");

// check entered password (each time at login)
$password_hash = '$2a$07$nw4dJlHqzkt7bdxeB04VIeWM/D68VMoskNAFTvG.9wTiC/7tURes.'; // this should be read in from the DB

if (crypt($password_entered, $password_hash) == $password_hash) {
    echo "correct password";
}
else {
    echo "incorrect password";
}
