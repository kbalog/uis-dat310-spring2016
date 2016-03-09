<!DOCTYPE html>
<html>
<head>
    <title>Exercise #2: Displaying a list</title>
</head>
<body>

<ol>
    {foreach $names as $name}
        <li>{$name}</li>
    {/foreach}
</ol>

</body>
</html>