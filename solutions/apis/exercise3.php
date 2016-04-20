<?php
/**
 * Exercise #3: FIFA countries
 */

$url = "https://en.wikipedia.org/wiki/List_of_FIFA_country_codes";

// get the page using curl
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$response = curl_exec($ch);
curl_close($ch);

// extract countries
$countries = array();
$pattern = "/\<td\>\<span class=\"flagicon\"\>(.*?)\<img(.*?)src=\"(.*?)\" width(.*?)\<a href=(.*?)\>(.*?)\</"; ///span\>\<a href(.*?)\>(.*?)\</a\>
preg_match_all($pattern, $response, $matches, PREG_SET_ORDER);

foreach ($matches as $val) {
    $countries[] = array(
        "flag" => $val[3],
        "name" => $val[6]
    );
}

// print the results as a table
echo "<table>\n";
for ($i = 0; $i < count($countries); $i++) {
    echo "<tr><td><img src='http://" . $countries[$i]['flag'] . "' /></td><td>" . $countries[$i]['name'] . "</td></tr>\n";
}
echo "</table>\n";
