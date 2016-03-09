<?php

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
