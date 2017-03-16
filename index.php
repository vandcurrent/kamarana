<?php
error_reporting("E_ALL ^ E_NOTICE");
session_start();

require_once('functions.php');

notification();
getheader();
getcontent();
getfooter();
?>
