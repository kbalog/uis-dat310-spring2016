<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Exercise #8: Days left</title>
</head>
<body>

<?php
$semester_end_date = new DateTime("2016-05-01 08:00");
$today = new DateTime();
$days = $today->diff($semester_end_date)->days;
?>

<h1><?php echo $days ?> days until the end of the semester</h1>

</body>
</html>
