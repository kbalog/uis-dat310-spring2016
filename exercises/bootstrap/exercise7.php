<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #7: Registration form</title>
    <style>
        div {
            margin-bottom: 5px;
            padding: 3px;
            width: 400px;
        }
        .error {
            background-color: #ffcccc;
            color: red;
        }
        .small {
            font-size: 0.8em;
        }
    </style>
</head>
<body>

<?php

function get_value_post($var) {
    return isset($_POST[$var]) ? $_POST[$var] : "";
}

function display_form($name = "", $email = "", $year = "", $month = "", $day = "", $sex = "", $terms = "", $errors = array()) {

    // displaying all errors
    if (count($errors) > 0) {
        echo '<div class="error small"><ul>';
        foreach ($errors as $field => $val) {
            echo "<li>" . $val . "</li>";
        }
        echo '</ul></div>';
    }

    echo '<form name="reg" action="exercise7.php" method="POST">';
    $error_name = array_key_exists("name", $errors) ? ' class="error"' : '';
    echo '<div' . $error_name . '><label>Name <input type="text" name="name" value="' . $name . '" size="20"/></label></div>';

    $error_email = array_key_exists("email", $errors) ? ' class="error"' : '';
    echo '<div' . $error_email . '><label>Email <input type="email" name="email" value="' . $email . '" size="20"/></label></div>';

    echo '<div>
        <label>Date of birth
        <select name="year">
        <option value="0">--</option>';
    // generate select options for year
    for ($y = 2000; $y <= 2020; $y++) {
        echo "<option value='" . $y . "'";
        if ($y == $year) {
            echo " selected";
        }
        echo ">" . $y . "</option>";
    }
    echo '</select><select name="month">
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
    echo '</select><select name="day">
        <option value="0">--</option>';
    // generate select options for day
    for ($d = 1; $d <= 31; $d++) {
        echo "<option value='" . $d . "'";
        if ($d == $day) {
            echo " selected";
        }
        echo ">" . $d . "</option>";
    }
    echo '</select></label></div>';

    $error_sex = array_key_exists("sex", $errors) ? ' class="error"' : '';
    echo '<div' . $error_sex . '><label>Sex';
    $male_sel = ($sex == "male") ? " checked" : "";
    $female_sel = ($sex == "female") ? " checked" : "";
    echo '<input type="radio" name="sex" value="male" ' . $male_sel . '/> Male';
    echo '<input type="radio" name="sex" value="female" ' . $female_sel . '/> Female';
    echo '</label></div>';

    $error_terms = array_key_exists("terms", $errors) ? ' class="error"' : '';
    $terms_sel = ($terms == 1) ? " checked" : "";
    echo '<div ' . $error_terms . '><input type="checkbox" name="terms" value="1" '. $terms_sel .' /> I accept the terms and conditions.</div>';

    echo '<input type="submit" name="submit" value="Register"></form>';

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

</body>
</html>