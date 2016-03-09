<!DOCTYPE html>
<html>
<head>
    <title>Exercise #4: Shared HTML frame</title>
</head>
<body>

<h1>Exercise #4 header</h1>

{if $page == "A"}
    {include file="exercise4_A.tpl"}
{elseif $page == "B"}
    {include file="exercise4_B.tpl"}
{else}
    {include file="exercise4_main.tpl"}
{/if}

<p>Exercise #4 footer</p>

</body>
</html>