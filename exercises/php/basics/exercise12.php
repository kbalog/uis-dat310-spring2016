<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #12: Registration form</title>
    <style>
        div {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<form name="reg" action="" method="POST">
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
</form>
</body>
</html>