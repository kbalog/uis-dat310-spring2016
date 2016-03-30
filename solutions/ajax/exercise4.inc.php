<?php
/**
 * Exercise #4: Booking availability
 *
 * This file contains functions to be used in exercise4.php.
 */

function year_select($name, $year) {
    echo '<select name="' . $name . '" id="' . $name . '" class="dateselector">';
    for ($y = 2015; $y <= 2020; $y++) {
        echo '<option value="' . $y . '"';
        if ($y == $year) {
            echo ' selected';
        }
        echo '>' . $y. '</option>';
    }
    echo '</select>';
}

function month_select($name, $month) {
    echo '<select name="' . $name . '" id="' . $name . '" class="dateselector">';
    for ($m = 1; $m <= 12; $m++) {
        $d = mktime(0, 0, 0, $m, 1, 2000);
        $monthname = date("F", $d);
        echo '<option value="' . $m . '"';
        if ($m == $month) {
            echo ' selected';
        }
        echo '>' . $monthname . '</option>';
    }
    echo '</select>';
}

function day_select($name, $day) {
    echo '<select name="' . $name . '" id="' . $name . '" class="dateselector">';
    for ($d = 1; $d <= 31; $d++) {
        echo '<option value="' . $d . '"';
        if ($d == $day) {
            echo ' selected';
        }
        echo '>' . $d. '</option>';
    }
    echo '</select>';
}

function days_select($name) {
    echo '<select name="' . $name . '" id="' . $name . '" class="dateselector">';
    for ($d = 1; $d <= 30; $d++) {
        echo '<option value="' . $d . '">' . $d. '</option>';
    }
    echo '</select>';
}
