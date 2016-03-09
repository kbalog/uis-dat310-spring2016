<?php
/**
 * Exercise #1: Displaying date
 */

require "smarty_init.inc.php";

$smarty->assign("now", date("Y-m-d H:i:s"));

$smarty->display("exercise1.tpl");
