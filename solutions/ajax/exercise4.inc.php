<?php
/**
 * Exercise #4: Booking availability
 *
 * This file contains functions to be used in exercise4.php and exercise4.ajax.php.
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

// return the day of week as 0: Monday, ... , 6: Sunday
function dow($date) {
    $dow = date("w", $date);  // day of week (0 for Sunday, 6 for Saturday)
    if ($dow == 0)
        return 6; // Sun
    else
        return $dow - 1; // Mon .. Sat
}

function displayCalendar($year, $month, $checkin, $checkout, $booked) {

    // table header
    echo "<table><thead><tr><th colspan='7'>" . $month . "/" . $year . "</th></tr><tr>";
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
        $class = array_key_exists(date("Y-m-d", $date), $booked) ? "booked" : "available";
        echo "<td class='" . $class . "'>" . $day . "</td>";
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

// checks the bookings for a given property for a given period
// and returns an associative array indexed with days for the days it is booked
function loadBookings($property_id, $checkin, $checkout) {
    global $db_server, $db_username, $db_password, $db_database;

    $date_from = date('Y-m-01', strtotime($checkin)); // first day of checkin month
    $date_to = date('Y-m-t', strtotime($checkout));  // last day of checkout month

    $mysqli = new mysqli($db_server, $db_username, $db_password, $db_database);
    $stmt = $mysqli->prepare("SELECT check_in, check_out FROM bookings WHERE property_id=? "
        . "AND (check_in BETWEEN ? and ? OR check_out BETWEEN ? and ?)");
    $stmt->bind_param("issss", $property_id, $date_from, $date_to, $date_from, $date_to);
    $stmt->bind_result($date1, $date2);
    $stmt->execute();

    $booked = array();  // $booked[$date] = true if the property is booked for that day

    // iterate results
    while ($stmt->fetch()) {
        // record that it was booked from date1 to date2 (excluded)
        $day = strtotime($date1);
        while ($day < strtotime($date2)) {
            $booked[date("Y-m-d", $day)] = true;
            $day = strtotime('+1 day', $day);
        }
    }
    $stmt->close();
    $mysqli->close();

    return $booked;
}