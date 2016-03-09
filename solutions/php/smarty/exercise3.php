<?php
/**
 * Exercise #3: Displaying a table
 */

require "smarty_init.inc.php";

$countries = array(
    array("country" => "Norway", "code" => "NO", "population" => "5,165,800"),
    array("country" => "Sweden", "code" => "SW", "population" => "9,801,616"),
    array("country" => "Denmark", "code" => "DK", "population" => "5,678,348"),
    array("country" => "Iceland", "code" => "IS", "population" => "329,100"),
);

$smarty->assign("countries", $countries);

$smarty->display("exercise3.tpl");
