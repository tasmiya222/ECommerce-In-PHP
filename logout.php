<?php
session_start();
include('connection.inc.php');
include('function.inc.php');

unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);

redirect('index.php');

?>