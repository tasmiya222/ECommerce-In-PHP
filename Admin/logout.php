<?php
include('function.inc.php');
session_start();
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USERNAME']);
redirect('login.php');


?>