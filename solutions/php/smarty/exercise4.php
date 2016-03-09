<?php
/**
 * Exercise #4: Shared HTML frame
 */

require "smarty_init.inc.php";

$page = isset($_GET['page']) ? $_GET['page'] : "";
$smarty->assign("page", $page);

switch ($page) {
    case "A":
        $smarty->assign("now", date("Y-m-d H:i:s"));
        break;
    case "B":
        $names = array("Adam", "Mary", "Julia", "Nicolas");
        $smarty->assign("names", $names);
        break;
}

$smarty->display("exercise4.tpl");
