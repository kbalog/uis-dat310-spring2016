<html>
<head>
    <title>Exercise #2: Listing users from file</title>
    <style>
        td {
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of birth</th>
                <th>Sex</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $filename = "users.txt";
        $fhandle = fopen($filename, "r");
        while (!feof($fhandle)) {
            $buffer = fgets($fhandle, 4096);
            $line = trim($buffer); // remove end line character
            if (strlen($line) == 0) // skip empty lines
                continue;
            echo "<tr>";
            $fields = explode("\t", $line);
            for ($i = 0; $i < count($fields); $i++) {
                echo "<td>" . $fields[$i] . "</td>";
            }
            echo "</tr>";
        }
        fclose($fhandle);
        ?>

        </tbody>
    </table>
</body>
</html>
