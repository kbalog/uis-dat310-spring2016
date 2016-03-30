<?php
/**
 * Exercise #4: Booking availability
 *
 * This file generates the AJAX response for checking availability.
 */

// TODO update it according to your MySQL settings
$db_server = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "dat310_booking";

require "exercise4.inc.php";

// get input values
if (isset($_GET['checkin']) && isset($_GET['days']) && isset($_GET['property_id'])) {
    $checkin_str = $_GET['checkin'];  // check-in date as string
    $checkin = strtotime($checkin_str);  // check-in date as Unix timestamp
    $days = $_GET['days'];
    $checkout = strtotime("+".$days." days", $checkin);  // check-out date as Unix timestamp
    $checkout_str = date("Y-m-d", $checkout);  // check-out date as string
    $property_id = $_GET['property_id'];

    // load the availability for the check-in month from the bookings table
    $booked = loadBookings($property_id, $checkin_str, $checkout_str);

    // generate HTML table(s) with the cells colored according to availability
    displayCalendar(date("Y", $checkin), date("m", $checkin), $checkin, $checkout, $booked); // calendar for check-in month
    if (date("m", $checkin) != date("m", $checkout)) { // if check-out is in a different month
        displayCalendar(date("Y", $checkout), date("m", $checkout), $checkin, $checkout, $booked); // calendar for check-out month
    }

}
else {
    echo "Invalid request";
}

// add 1s delay before returning the response
sleep(1);
