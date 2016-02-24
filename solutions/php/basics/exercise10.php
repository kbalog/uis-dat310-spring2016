<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Exercise #10: Calendar</title>
    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        th, td {
            border: 1px solid grey;
            width: 3em;
        }
    </style>
</head>
<body>

<?php

require("calendar.inc.php");

if (isset($_GET['year'])) {
    $year = $_GET['year'];

    if (isset($_GET['month'])) {
        $month = $_GET['month'];
        displayCalendar($year, $month);
    }
    else {
        displayMonths($year);
    }
}
else {
    displayYears();
}

?>

</body>
</html>
