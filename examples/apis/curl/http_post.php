<?php
/**
 * Make a POST HTTP request using cURL
 */

// change it to according to your local settings
$url = "http://localhost/web-programming/examples/apis/curl/postform.php";

// form parameters
$params = array(
    "name" => "Ravishanker Kusuma",
    "age" => "32"
);

// create name value pairs seperated by &
// $data will be sent in the body of the request
$data = "";
foreach($params as $k => $v) {
    if (strlen($data) > 0) {
        $data .= "&";
    }
    $data .= $k . '=' . $v;
}

// 1. initialize
$ch = curl_init($url);

// 2. set transfer options
// set method to POST
curl_setopt($ch, CURLOPT_POST, true);
// data to be posted
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// return the transfer as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// set true for including the header in the output
curl_setopt($ch, CURLOPT_HEADER, false);

// 3. execute the session
$response = curl_exec($ch);

// 4. finish the session
curl_close($ch);

// echo HTTP response
echo $response;