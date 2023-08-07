<?php
session_start();
include('connection.inc.php');
include('function.inc.php');
$msg="";
// Login Code
if(isset($_POST['submit']))
{
    $username = get_safe_value($con,$_POST['username']);
    $password = get_safe_value($con,$_POST['password']);

    $login = "select * from admin_users where username='$username' and password='$password'";
    $LoginQuery = mysqli_query($con,$login);
    $count = mysqli_num_rows($LoginQuery);
    if($count>0)
    {
          $_SESSION['ADMIN_LOGIN'] = 'yes';
          $_SESSION['ADMIN_USERNAME'] = $username;
          redirect('categories.php');
    }
    else
    {
        $msg= "Please Enter Valid Login Details";
    }
}



?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form method="post">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" >
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                     </div>
                     <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30" name="submit">Sign in</button>
                    
					</form>
                    <div class="error-msg"><?php echo $msg; ?></div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>