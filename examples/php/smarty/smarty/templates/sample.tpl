<!DOCTYPE html>
<html>
<head>
    <title>Smarty example</title>
</head>
<body>

Hello, {$name}!

Listing fruits:
<ul>
    {foreach $fruits as $f}
        <li>{$f}</li>
    {/foreach}
</ul>

Listing colors:
<table>
    {foreach $colors as $key => $value}
        <tr style="background: {cycle values='#cccccc, #ececec'}; color: {$value};">
            <td>{$key}</td>
            <td>{$value}</td>
        </tr>
    {/foreach}
</table>

</body>
</html>