<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Exercise #9: Calendar of the month</title>
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
    // TODO initial empty days

    // TODO days

    // TODO remaining empty days

    echo "</tbody></table>";
}

displayCalendar(2016, 4);

?>

</body>
</html>
