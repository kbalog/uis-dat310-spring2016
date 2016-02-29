<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #12: Registration form</title>
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

    echo '<form name="reg" action="exercise12.php" method="POST">';
    $error_name = array_key_exists("name", $errors) ? ' class="error"' : '';
    echo '<div' . $error_name . '><label>Name <input type="text" name="name" value="' . $name . '" size="20"/></label></div>';

    $error_email = array_key_exists("email", $errors) ? ' class="error"' : '';
    echo '<div' . $error_email . '><label>Email <input type="email" name="email" value="' . $email . '" size="20"/></label></div>';

    echo '<div>
        <label>Date of birth
    <select name="year">
                <option value="2000">2000</option>
            </select>
            <select name="month">
                <option value="1">January</option>
            </select>
            <select name="day">
                <option value="1">1</option>
            </select>
        </label>
    </div>
    ';

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
    // TODO
    
    // sex
    if (strlen($sex) == 0) {
        $errors['sex'] = "Sex is missing";
    }

    // terms
    if ($terms != 1) {
        $errors['terms'] = "Terms and conditions must be accepted";
    }

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