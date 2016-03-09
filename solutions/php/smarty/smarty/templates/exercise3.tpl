<!DOCTYPE html>
<html>
<head>
    <title>Exercise #3: Displaying a table</title>
    <style>
        th, td {
            border: 1px solid grey;
            padding: 2px;
        }
    </style>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Code</th>
        <th>Country</th>
        <th>Population</th>
    </tr>
    </thead>
    <tbody>
        {foreach $countries as $country}
            <tr>
                <td>{$country['code']}</td>
                <td>{$country['country']}</td>
                <td>{$country['population']}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

</body>
</html>