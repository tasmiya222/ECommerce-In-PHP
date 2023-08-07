<?php
$con = mysqli_connect("localhost","root","","ak_Collection");


define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']."/AkCollection/");
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH."media/product/");

define('SITE_PATH','http://localhost/AkCollection/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH."media/product/");


?>