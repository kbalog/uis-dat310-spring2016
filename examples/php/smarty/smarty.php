<?php
/**
 * Example Smarty project
 */

// make sure errors are displayed
ini_set("display_errors", 1);
error_reporting(E_ALL);

// edit these two lines according to your local settings
define("SMARTY_DIR", "/Users/kbalog/Sites/Smarty-3.1.28/libs/");
define("PROJECT_DIR", "");

// init Smarty
require(SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty();
$smarty->setTemplateDir(PROJECT_DIR . "smarty/templates");
$smarty->setCompileDir(PROJECT_DIR . "smarty/templates_c");
$smarty->setCacheDir(PROJECT_DIR . "smarty/cache");
$smarty->setConfigDir(PROJECT_DIR . "smarty/config");
//$smarty->testInstall();

// passing some data to Smarty

// single value
$smarty->assign("name", "John");

// list
$fruits = array("apple", "orange", "banana");
$smarty->assign("fruits", $fruits);

// associative array
$colors = array(
    "red" => "#ff0000",
    "green" => "#00ff00",
    "blue" => "#0000ff",
);
$smarty->assign("colors", $colors);

// display HTML
$smarty->display("sample.tpl");
