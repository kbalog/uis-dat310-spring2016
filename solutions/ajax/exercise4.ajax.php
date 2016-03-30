<?php
/**
 * Exercise #4: Booking availability
 *
 * This file generates the AJAX response for checking availability.
 */

// get input values
if (isset($_GET['checkin']) && isset($_GET['days'])) {
    $checkin = $_GET['checkin'];
    $days = $_GET['days'];

    echo "Check from " . $checkin . " for " . $days . " days";

    // TODO load the availability for the selected period from the bookings table

    // TODO generate HTML table(s) with the cells colored according to availability
}
else {
    echo "Invalid request";
}

// add 1s delay before returning the response
sleep(1);
