<?php
/**
 * Exercise #2: Displaying a list
 */

require "smarty_init.inc.php";

$names = array("Adam", "Mary", "Julia", "Nicolas");
$smarty->assign("names", $names);

$smarty->display("exercise2.tpl");
