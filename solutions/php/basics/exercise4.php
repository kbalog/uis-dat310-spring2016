<?php
/**
 * PHP basics Exercise #4 solution
 */

$numbers = array(1, 5, 7, 9);

function meanAndMedian($numbers) {
    $mean = 0;
    $median = 0;

    // compute them only if the array is non-empty
    if (count($numbers) > 0) {
        // mean
        $sum = 0;
        for ($i = 0; $i < count($numbers); $i++) {
            $sum += $numbers[$i];
        }
        // alternatively: $sum = array_sum($numbers)
        $mean = $sum / count($numbers);

        // median
        sort($numbers); // sort numbers first
        if (count($numbers) % 2 == 1) { // odd number of numbers
            $middle = (count($numbers) - 1) / 2; // middle element
            $median = $numbers[$middle];
        } else { // even number of numbers
            $middle = count($numbers) / 2; // no rounding needed
            $median = ($numbers[$middle - 1] + $numbers[$middle]) / 2;
        }
    }

    echo "mean = " . $mean . "\n";
    echo "median = " . $median . "\n";
}

$numbers = array(1, 5, 7, 9);
meanAndMedian($numbers);
