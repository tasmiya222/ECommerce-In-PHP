<?php
include('connection.inc.php');
include('function.inc.php');

$name="";
$email="";
$mobile="";
$password="";

$name = get_safe_value($con,$_POST['name']);
$email = get_safe_value($con,$_POST['email']);
$mobile = get_safe_value($con,$_POST['mobile']);
$password= get_safe_value($con,$_POST['password']);


// check if there is any duplicate email
$check = mysqli_num_rows(mysqli_query($con, "select * from users where email = '$email'"));
if($check>0)
{
    echo "present";
}
else
{
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into users(name,email,mobile,password,added_on)values('$name','$email','$mobile','$password','$added_on')");
   echo "insert";
}
?>