<!DOCTYPE html>
<?php
require("Properties.class.php");
$prop = new Properties();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise #2: Map of properties</title>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapProp = {
                center: new google.maps.LatLng(63, 6),
                zoom: 4,
                mapTypeId: google.maps.MapTypeId.HYBRID
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            <?php
            $props = $prop->listProperties();
            for ($i = 0; $i < count($props); $i++) {
                // markers
                echo "var marker" . $i . " = new google.maps.Marker({
                    position: new google.maps.LatLng(" . $props[$i]['latitude'] . ", " . $props[$i]['longitude'] . ")
                });
                marker" . $i . ".setMap(map);\n";
                // info windows
                $infoContent = "<div style='float:left;margin-right: 10px;'><img src='images/" . $props[$i]['photo'] . "' width='100px' /></div>"
                    ."<h3>" . $props[$i]['name'] . "</h3><h4 style='margin-top:0'>" . $props[$i]['location'] . "</h4>"
                    . "<p> " . $props[$i]['description'] . "</p>";
                echo "var infowindow" . $i . "  = new google.maps.InfoWindow({
                    content: \"" . $infoContent . "\",
                    maxWidth: 300
                });
                marker" . $i . ".addListener('click', function() {
                    infowindow" . $i . ".open(map, marker" . $i . ");
                });\n";
            }

            ?>
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="googleMap" style="width:700px;height:400px;"></div>
</body>
</html>
<?php
$prop->close();
?>