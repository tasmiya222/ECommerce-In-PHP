<?php
session_start();
include('connection.inc.php');
include('function.inc.php');
//defing the varaible
$email ="";
$password="";


$email = get_safe_value($con,$_POST['email']);
$password = get_safe_value($con,$_POST['password']);

$Query = mysqli_query($con,"select * from users where email='$email' and  password='$password'");
$check_user = mysqli_num_rows($Query);
if($check_user>0)
{

    $row = mysqli_fetch_assoc($Query);
    $_SESSION['USER_LOGIN'] = 'yes';
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['name'];
    echo "valid";

    // Add Wishlist data while loging 
    if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID'] !='')
    {
        wishlist_add($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
		unset($_SESSION['WISHLIST_ID']);
    }
}
else
{
    echo "wrong";
}


?>