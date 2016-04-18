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