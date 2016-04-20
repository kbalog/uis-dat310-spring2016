<?php
/**
 * Exercise #4: Photos from Flickr
 */

require("get_content.php");

$url = "http://api.flickr.com/services/feeds/photos_public.gne";

// TODO provide the parameters
$params = array(
    "nojsoncallback" => 1
);

// get response as an associative array
$data = get_json_content($url, $params);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercise #4: Photos from Flickr</title>
    <style>
        td {
            border: 1px solid grey;
        }
    </style>
</head>
<body>
<table>

    <?php
    $photos = $data['items'];
    // TODO display photos in a table
    ?>

</table>
</body>
</html>
