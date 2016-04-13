<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #7: Registration form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 10px;">

<?php

function get_value_post($var) {
    return isset($_POST[$var]) ? $_POST[$var] : "";
}

function display_form($name = "", $email = "", $year = "", $month = "", $day = "", $sex = "", $terms = "", $errors = array()) {
    global $submitted;

    // determining the success state for each input field
    $fields = array("name", "email", "date", "sex", "terms");
    $class = array();
    foreach ($fields as $f) {
        $class[$f] = $submitted ? "has-success" : "";
    }

    // displaying all errors
    if (count($errors) > 0) {
        foreach ($errors as $field => $val) {
            echo '<div class="alert bg-danger text-danger">' . $val . "</div>";
            $class[$field] = "has-error";
        }
    }

    echo '<form name="reg" action="exercise7.php" method="POST"  class="form-horizontal">';

    // NAME
    echo '<div class="form-group ' . $class['name'] . '">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6"><input type="text" name="name" id="name" value="' . $name . '" class="form-control" /></div>
    </div>';

    // EMAIL
    echo '<div class="form-group ' . $class['email'] . '">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-6"><input type="email" name="email" id="email" value="' . $email . '" class="form-control" /></div>
    </div>';

    // DATE OF BIRTH
    echo '<div class="form-group ' . $class['date'] . '">
        <label for="year" class="col-sm-2 control-label">Date of birth</label>
        <div class="col-sm-2">
        <select name="year" id="year" class="form-control">
        <option value="0">--</option>';
    // generate select options for year
    for ($y = 2000; $y <= 2020; $y++) {
        echo "<option value='" . $y . "'";
        if ($y == $year) {
            echo " selected";
        }
        echo ">" . $y . "</option>";
    }
    echo '</select></div>
    <div class="col-sm-2">
    <select name="month" class="form-control">
        <option value="0">--</option>';
    // generate select options for month
    for ($m = 1; $m <= 12; $m++) {
        $d = mktime(0, 0, 0, $m, 1, 2000);
        $monthname = date("F", $d);
        echo "<option value='" . $m . "'";
        if ($m == $month) {
            echo " selected";
        }
        echo ">" . $monthname . "</option>";
    }
    echo '</select></div>
    <div class="col-sm-2">
    <select name="day" class="form-control">
        <option value="0">--</option>';
    // generate select options for day
    for ($d = 1; $d <= 31; $d++) {
        echo "<option value='" . $d . "'";
        if ($d == $day) {
            echo " selected";
        }
        echo ">" . $d . "</option>";
    }
    echo '</select></div></div>';

    // SEX
    $male_sel = ($sex == "male") ? " checked" : "";
    $female_sel = ($sex == "female") ? " checked" : "";
    echo '<div class="form-group ' . $class['sex'] . '">
    <label for="sex" class="col-sm-2 control-label">Sex</label>
    <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="sex" id="sex" value="male" ' . $male_sel . '/> Male</label>
        <label class="radio-inline"><input type="radio" name="sex" value="female" ' . $female_sel . ' /> Female</label>
    </div></div>';

    // TERMS
    $terms_sel = ($terms == 1) ? " checked" : "";
    echo '<div class="form-group ' . $class['terms'] . '">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <label class="checkbox-inline"><input type="checkbox" name="terms" value="1" '. $terms_sel .' /> I accept the terms and conditions.</label>
    </div></div>';

    // BUTTON
    echo '<div class="form-group">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <input type="submit" name="submit" class="btn btn-primary" value="Register">
    </div>
    </div>
    </form>';

}

function confirm($name, $email, $year, $month, $day, $sex) {
    echo "<h1>Successful registration</h1>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Date of birth: " . $year . "-" . $month . "-" . $day . "<br>";
    echo "Sex: " . $sex . "<br>";
}

// performs the input check and returns the errors in an associative array,
// indexed with the name of the input
function input_check($name, $email, $year, $month, $day, $sex, $terms) {
    $errors = array(); // associative array indexed with field names holding errors

    // name
    if (strlen($name) == 0) {
        $errors['name'] = "Name is missing";
    }
    elseif (strlen($name) < 3) {
        $errors['name'] = "Invalid name";
    }

    // email
    if (strlen($email) == 0) {
        $errors['email'] = "Email is missing";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address";
    }

    // date
    if (checkdate($month, $day, $year)) {
        // check whether there has been 5 years between now and the entered date
        $time_min = new DateTime("now");
        $time_min->modify('-5 years');
        $time_reg = new DateTime();
        $time_reg->setDate($year, $month, $day);
        if ($time_reg >= $time_min) {
            $errors['date'] = "You need to be minimum 5 years old";
        }
    }
    else {
        $errors['date'] = "Invalid date";
    }

    // sex
    if (strlen($sex) == 0) {
        $errors['sex'] = "Sex is missing";
    }

    // terms
    if ($terms != 1) {
        $errors['terms'] = "Terms and conditions must be accepted";
    }

    return $errors;
}

// read in form values
$name = get_value_post("name");
$email = get_value_post("email");
$year = get_value_post("year");
$month = get_value_post("month");
$day = get_value_post("day");
$sex = get_value_post("sex");
$terms = get_value_post("terms");

// check if the form has been submitted -- any of the input values is set
$submitted = isset($_POST['name']);

if ($submitted) {
    // check for errors
    $errors = input_check($name, $email, $year, $month, $day, $sex, $terms);

    if (count($errors) > 0) {
        display_form($name, $email, $year, $month, $day, $sex, $terms, $errors);
    }
    else {
        confirm($name, $email, $year, $month, $day, $sex);
    }
}
else {
    // display form for the first time
    display_form();
}

?>

</div>
</body>
</html>