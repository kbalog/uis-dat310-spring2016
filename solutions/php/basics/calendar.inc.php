<?php
/**
 * The first two functions are copy-pasted from Exercise #9 to be reused in Exercise #10
 */

// return the day of week as 0: Monday, ... , 6: Sunday
function dow($date) {
    $dow = date("w", $date);  // day of week (0 for Sunday, 6 for Saturday)
    if ($dow == 0)
        return 6; // Sun
    else
        return $dow - 1; // Mon .. Sat
}

function displayCalendar($year, $month) {

    // display header
    echo "<h1>Calendar for " . $month . "/" . $year . "</h1>";

    // table header
    echo "<table><thead><tr>";
    $days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    for ($i = 0; $i < count($days); $i++) {
        echo "<th>" . $days[$i] . "</th>\n";
    }
    echo "</tr></thead><tbody><tr>";

    // table body
    // initial empty days
    $date = mktime(0, 0, 0, $month, 1, $year);  // 1st day of the month
    $dow = dow($date);  // use our own dow() function to get day-of-week
    for ($i = 0; $i < $dow; $i++) {
        echo "<td>&nbsp;</td>";
    }

    // days
    $numdays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    for ($day = 1; $day <= $numdays; $day++) {
        $date = mktime(0, 0, 0, $month, $day, $year);
        echo "<td>" . $day . "</td>";
        if (dow($date) == 6) { // Sun
            echo "</tr>"; // close row
            if ($day < $numdays) { // more days to come
                echo "<tr>";
            }
        }
    }

    // remaining empty days
    // Mind that $date holds the last day of the month
    $left = 6 - dow($date);
    if ($left > 0) {
        for ($i = 0; $i < $left; $i++) {
            echo "<td>&nbsp;</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}

/**
 * The functions below are written for Exercise #10
 */

function displayYears() {
    echo "<ul>";
    for ($year = 2000; $year <= 2020; $year++) {
        echo "<li><a href='exercise10.php?year=" . $year . "'>" . $year . "</a></li>";
    }
    echo "</ul>";
}

function displayMonths($year) {
    echo "<h1>" . $year . "</h1>";
    echo "<ul>";
    for ($month = 1; $month <= 12; $month++) {
        $d = mktime(0, 0, 0, $month, 1, $year);
        $monthname = date("F", $d);
        echo "<li><a href='exercise10.php?year=" . $year . "&month=" . $month . "'>" . $monthname . "</a></li>";
    }
    echo "</ul>";
    echo "<a href='exercise10.php'>back to year selection</a>";
}
