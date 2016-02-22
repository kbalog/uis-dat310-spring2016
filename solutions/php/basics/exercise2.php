<?php
/**
 * PHP basics Exercise #2 solution
 */

/** Solution 1 */
function mixCase($str) {
    $newstring = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $char = substr($str, $i, 1);
        if ($i % 2 == 0) {
            $char = strtoupper($char);
        }
        $newstring .= $char;
    }
    return $newstring;
}

/** Solution 2 */
function mixCase2($str) {
    for ($i = 0; $i < strlen($str); $i += 2) {
        $str[$i] = strtoupper($str[$i]);
    }
    return $str;
}

echo mixCase("teststring"); // TeStStRiNg
echo mixCase2("teststring");
