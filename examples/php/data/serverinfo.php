<?php
/**
 * Server and environment variables
 *
 * See more: http://www.php.net/manual/en/reserved.variables.server.php
 */

echo "This script: " . $_SERVER['PHP_SELF'] . "<br />";
echo "Your IP: " . $_SERVER['REMOTE_ADDR'] . "<br />";
echo "Your host: " . $_SERVER['REMOTE_HOST'] . "<br />";
echo "Your browser: " . $_SERVER['HTTP_USER_AGENT'] . "<br />";
echo "Server name: " . $_SERVER['SERVER_NAME'] . "<br />";
echo "Server software: " . $_SERVER['SERVER_SOFTWARE'] . "<br />";
echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "<br />";

?>
