<?php

// wait one sec
sleep(1);

// we use $_REQUEST so that it works both with GET and POST
echo md5($_REQUEST['pw']);

