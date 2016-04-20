<?php
/**
 * Exercise #4: Photos from Flickr
 */

require("get_content.php");

$url = "http://api.flickr.com/services/feeds/photos_public.gne";

$params = array(
    "nojsoncallback" => 1,
    "tags" => "stavanger",
    "tagmode" => "any",
    "format" => "json",
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
    for ($i = 0; $i < min(5, count($photos)); $i++) {
        echo '<tr><td><a href="' . $photos[$i]['link'] . '">'
            . '<img src="' . $photos[$i]['media']['m'] . '" width="100px"></a></td>'
            . '<td><strong>' . $photos[$i]['title'] . '</strong><br/>'
            . $photos[$i]['published'] . '<br /><br />'
            . $photos[$i]['tags'] . '</td></tr>';
    }
    ?>

</table>
</body>
</html>
