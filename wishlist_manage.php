<?php
include('connection.inc.php');
include('function.inc.php');
include('add_to_cart.inc.php');

$pid="";
$type="";

$pid = get_safe_value($con,$_POST['pid']);
$type = get_safe_value($con,$_POST['type']);

if(isset($_SESSION['USER_LOGIN']))
{
    $uid = $_SESSION['USER_ID'];
    //If this product is alreay added in wishlist
    if(mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0)
    {
        echo "Already Exist";
    }
    //If this product is not added in wishlist
    else
     {
        //inserting the data in table
        // $added_on = date('Y-m-d h:i:s');
        // mysqli_query($con,"insert into wishlist(user_id,product_id,added_on)values('$uid','$pid','$added_on')");
    }
    //Increase count in Wishlist.
	echo $total_count = mysqli_num_rows(mysqli_query($con,"select * from wishlist where user_id='$uid' "));

}
else
{ 
    //If user is not login
	$_SESSION['WISHLIST_ID']=$pid;
    echo "not_login";
}
?>