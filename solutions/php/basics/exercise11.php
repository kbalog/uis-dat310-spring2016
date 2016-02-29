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

$year = isset($_GET['year']) ? $_GET['year'] : 0;
$month = isset($_GET['month']) ? $_GET['month'] : 0;

?>

<form name="cal" action="exercise11.php" method="GET">
    Year: <select name="year">
        <option value="0">--</option>
        <?php
        for ($y = 2000; $y <= 2020; $y++) {
            echo "<option value='" . $y . "'";
            if ($y == $year) {
                echo " selected";
            }
            echo ">" . $y . "</option>";
        }
        ?>
    </select>

    Month: <select name="month">
        <option value="">--</option>
        <?php
        for ($m = 1; $m <= 12; $m++) {
            $d = mktime(0, 0, 0, $m, 1, 2000);
            $monthname = date("F", $d);
            echo "<option value='" . $m . "'";
            if ($m == $month) {
                echo " selected";
            }
            echo ">" . $monthname . "</option>";
        }
        ?>
    </select>

    <input type="submit" value="Display" />

</form>

<?php

if ($year > 0 && $month > 0) {
    require("calendar.inc.php");
    displayCalendar($year, $month);
}

?>

</body>
</html>
