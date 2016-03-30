<?php
/**
 * Exercise #4: Booking availability
 *
 * This file generates the AJAX response for checking availability.
 */

require "exercise4.inc.php";


// get input values
if (isset($_GET['checkin']) && isset($_GET['days'])) {
    $checkin_str = $_GET['checkin'];  // check-in date as string
    $checkin = strtotime($checkin_str);  // check-in date as Unix timestamp
    $days = $_GET['days'];
    $checkout = strtotime("+".$days." days", $checkin);  // check-out date as Unix timestamp
    $checkout_str = date("Y-m-d", $checkout);  // check-out date as string

    // TODO load the availability for the selected period from the bookings table

    // TODO generate HTML table(s) with the cells colored according to availability
    displayCalendar(date("Y", $checkin), date("m", $checkin)); // calendar for check-in month
    if (date("m", $checkout) != date("m", $checkin)) { // if check-out is in a different month
        displayCalendar(date("Y", $checkout), date("m", $checkout)); // calendar for check-out month
    }

}
else {
    echo "Invalid request";
}

// add 1s delay before returning the response
sleep(1);
