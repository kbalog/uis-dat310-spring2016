<?php
/**
 * PHP basics Exercise #1 solution
 */

function sumMaxTwo($a, $b, $c) {
    return $a + $b + $c - min($a, $b, $c);
    // alternatively, you can find the min yourself
    // if ($a >= $b && $a >= $c) {$min = $a}
    // ...
}

echo sumMaxTwo(1, 2, 3); // 5
