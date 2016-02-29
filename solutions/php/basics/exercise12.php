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

    echo '<form name="reg" action="" method="POST">
    <div>
        <label>Name
            <input type="text" name="name" size="20"/>
        </label>
    </div>
    <div>
        <label>Email
            <input type="email" name="email" size="20"/>
        </label>
    </div>
    <div>
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
    <div>
        <label>Sex
            <input type="radio" name="sex" value="male"/> Male
            <input type="radio" name="sex" value="female"/> Female
        </label>
    </div>
    <div>
        <input type="checkbox" name="terms" value="1"/> I accept the terms and conditions.
    </div>
    <input type="submit" name="submit" value="Register">
</form>';

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

    // TODO

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