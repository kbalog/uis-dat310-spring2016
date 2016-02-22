<?php
/**
 * PHP basics Exercise #3 solution
 */


function strength($password) {

    if (strlen($password) == 0) // empty string input
        return 0;

    // compute the types characters
    $letter_lower = 0; // lowercase letters
    $letter_upper = 0; // uppercase letters
    $numeric = 0; // numberic
    $non_alph = 0; // non-alphanumeric
    for ($i = 0; $i < strlen($password); $i++) {
        $ch = $password[$i];
        if ($ch >= "a" && $ch <= "z") {
            $letter_lower++;
        }
        else if ($ch >= "A" && $ch <= "Z") {
            $letter_upper++;
        }
        else if ($ch >= "0" && $ch <= "9") {
            $numeric++;
        }
        else {
            $non_alph++;
        }
    }

    // debug
    //echo "Lowercase letters: " . $letter_lower . "<br>";
    //echo "Uppercase letters: " . $letter_upper . "<br>";
    //echo "Numeric: " . $numeric . "<br>";
    //echo "Non-alphanumeric: " . $non_alph . "<br>";

    if (strlen($password) > 8
        && $letter_lower > 0 && $letter_upper > 0
        && $numeric > 1 && $non_alph > 0) {
        return 3; // strong
    }
    else if (strlen($password) >=6
        && $letter_lower > 0 && $letter_upper > 0
        && $numeric > 0) {
        return 2; // medium
    }

    return 1; // weak
}

echo strength("abcadG3");
